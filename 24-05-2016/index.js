const getMatrix = (rows, columns) => {
	var total = rows*columns;
	var array = [];

	for (var count = 0; count < total; count++) {
		array[count] = count+1;
	}

	return array;
}

const generateEspiral = (rows, columns, array) => {
	var arr = [];
	var agoraVai = [];

	for (var count = 0; count < rows; count++) {
		arr[count] = []
		agoraVai[count] = []

		for (var i = 0; i < columns; i++) {
			arr[count][i] = columns * count + i + 1;
			agoraVai[count][i] = arr[count][i]
		}
	}

	console.log(arr);
	console.log(agoraVai);

	for (var j = 0; j < (array.length); j++) {
		console.log(j + 1)
	}

	return arr;
}

module.exports = (rows, columns) => {
	return generateEspiral(rows, columns, getMatrix(rows, columns))
}