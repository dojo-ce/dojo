import mod from './index';
import test from 'ava';

test('verifica conversao de numeros', t => {
    t.is(mod.converte('I'), 1);
    t.is(mod.converte('V'), 5);
    t.is(mod.converte('X'), 10);
    t.is(mod.converte('L'), 50);
    t.is(mod.converte('C'), 100);
    t.is(mod.converte('D'), 500);
    t.is(mod.converte('M'), 1000);
    t.is( mod.converte(1), 'I');
    t.is( mod.converte(5), 'V');
    t.is( mod.converte(10), 'X');
    t.is( mod.converte(50), 'L');
    t.is( mod.converte(100), 'C');
    t.is( mod.converte(500), 'D');
    t.is( mod.converte(1000), 'M');
});

test('checa contagem dos romanos', t => {
    t.is(mod.checarRepetidor('IIII'), false);
    t.is(mod.checarRepetidor('III'), true);
    t.is(mod.checarRepetidor('XXXX'), false);
    t.is(mod.checarRepetidor('XXX'), true);
    t.is(mod.checarRepetidor('CCCC'), false);
    t.is(mod.checarRepetidor('CCC'), true);
    t.is(mod.checarRepetidor('MMMM'), false);
    t.is(mod.checarRepetidor('MMM'), true);
    t.is(mod.checarRepetidor('V'), true);
    t.is(mod.checarRepetidor('VV'), false);
    t.is(mod.checarRepetidor('VIII'), true);
    t.is(mod.checarRepetidor('VIIII'), false);
    t.is(mod.checarRepetidor('VVVI'), false);
    t.is(mod.checarRepetidor('MCXX'), true);
    t.is(mod.checarRepetidor('MCXXXX'), false);
});

test('Soma dos algarismos', t => {
    t.is(mod.calcular('XXXX'), false);
    t.is(mod.calcular('XX'), 20);
    t.is(mod.calcular('XV'), 15);
    t.is(mod.calcular('XVI'), 16);
    t.is(mod.calcular('XIV'), 14);
    t.is(mod.calcular('XLIX'), 49);
    t.is(mod.calcular('CXLIX'), 149);
    t.is(mod.calcular('CIL'), false);
});

test('verifica caracteres indevidos', t => {
    t.is(mod.possuiCaracteresIndevidos('Z'), true);
    t.is(mod.possuiCaracteresIndevidos('X'), false);
    t.is(mod.possuiCaracteresIndevidos('XIV'), false);
    t.is(mod.possuiCaracteresIndevidos('XIB'), true);
    t.is(mod.possuiCaracteresIndevidos('CL'), false);
    t.is(mod.possuiCaracteresIndevidos('SHY'), true);
    t.is(mod.possuiCaracteresIndevidos('MTRGIII'), true);
});

test('verifica ordem caracteres ', t => {
    t.is(mod.checarOrdem('LI'), true);
    t.is(mod.checarOrdem('IL'), false);
    t.is(mod.checarOrdem('DIL'), false);
    t.is(mod.checarOrdem('MI'), true);
    t.is(mod.checarOrdem('XLIX'), true);
});