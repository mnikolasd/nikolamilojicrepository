sap.ui.define(["sap/m/Text","opensap/orders/model/formatter"],function(t,n){"use strict";QUnit.module("formatter - Currency value");function o(t,o,e){var i=n.currencyValue(o);t.strictEqual(i,e,"The rounding was correct")}function e(t,o,e){var i=n.convertCurrencyCodeToSymbol(o);t.strictEqual(i,e,"The conversion was correct")}QUnit.test("Should round down a 3 digit number",function(t){o.call(this,t,"3.123","3.12")});QUnit.test("Should round up a 3 digit number",function(t){o.call(this,t,"3.128","3.13")});QUnit.test("Should round a negative number",function(t){o.call(this,t,"-3","-3.00")});QUnit.test("Should round an empty string",function(t){o.call(this,t,"","")});QUnit.test("Should round a zero",function(t){o.call(this,t,"0","0.00")});QUnit.module("formatter - Currency Code");QUnit.test("Should convert to $",function(t){e.call(this,t,"USD","$")});QUnit.test("Should convert to €",function(t){e.call(this,t,"EUR","€")});QUnit.test("Should not convert CHF",function(t){e.call(this,t,"CHF","CHF")});QUnit.test("Should not convert an empty string",function(t){e.call(this,t,"","")})});