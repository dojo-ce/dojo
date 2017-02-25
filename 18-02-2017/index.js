function converte(valor) {
	var romanos = {
		I: 1,
		V: 5,
		X: 10,
		L: 50,
		C: 100,
		D: 500,
		M: 1000
	};

	if (typeof valor !== 'string') {
		for (var key in romanos) {
			if(valor === romanos[key]) {
				return key;
			}
		}
	}

	return romanos[valor];
}

function checarRepetidor(valor) {
	var regexMaximo  = /(C{4,})|(I{4,})|(X{4,})|(M{4,})|(V{2,})|(L{2,})|(D{2,})/ig; // rever e deixar mais simples

    return !regexMaximo.test(valor);
}

function possuiCaracteresIndevidos(valor) {
	var listaDeValidos = /[^CIXMVLD]/ig;

	return listaDeValidos.test(valor);
}

function obterExcecoes() {
	var excecoes = {
		IV:4,
		IX:9,
		XL:40,
		XC:90,
		CD:400,
		CM:900
	};

	return excecoes;
}

function checarOrdem(valor){
	var excessoes = obterExcecoes();

	for (var key in excessoes) {
		if (valor.indexOf(key) === -1) {
			continue;
		}

		valor = valor.replace(key, '');
	}

	var romanos = {
		I: 1,
		V: 5,
		X: 10,
		L: 50,
		C: 100,
		D: 500,
		M: 1000
	};

	var arrayValores = valor.split('');

	for (var key in arrayValores) {
		key = parseInt(key);

		if (key === arrayValores.length) { break;}

		var anterior = romanos[arrayValores[key]];
		var proximo  = romanos[arrayValores[key + 1]];

		if (anterior < proximo) {
			return false;
		}
	}

	return true;
}

function calcular(valor) {
	if (!checarRepetidor(valor) || possuiCaracteresIndevidos(valor) || !checarOrdem(valor)) {
		return false;
	}

	var excecoes = obterExcecoes();
	var soma 	 = 0;

	for (var key in excecoes) {
		if (valor.indexOf(key) === -1) {
			continue;
		}

		soma += excecoes[key];
		valor = valor.replace(key, '');
	}

	valor 	 = valor.split('');

	for (var key in valor){
		soma += converte(valor[key]);
	}

	return soma;
}

module.exports.converte                  = converte;
module.exports.checarRepetidor           = checarRepetidor;
module.exports.calcular                  = calcular;
module.exports.possuiCaracteresIndevidos = possuiCaracteresIndevidos;
module.exports.checarOrdem               = checarOrdem;