sap.ui.define(["sap/ui/core/util/MockServer","sap/ui/model/json/JSONModel","sap/base/Log","sap/base/util/UriParameters"],function(e,r,t,a){"use strict";var o,i="opensap/orders/Orders/",n=i+"localService/mockdata";var s={init:function(s){var u=s||{};return new Promise(function(s,c){var p=sap.ui.require.toUrl(i+"manifest.json"),f=new r(p);f.attachRequestCompleted(function(){var r=new a(window.location.href),c=sap.ui.require.toUrl(n),p=f.getProperty("/sap.app/dataSources/mainService"),l=sap.ui.require.toUrl(i+p.settings.localUri),d=/.*\/$/.test(p.uri)?p.uri:p.uri+"/";d=d&&new URI(d).absoluteTo(sap.ui.require.toUrl(i)).toString();if(!o){o=new e({rootUri:d})}else{o.stop()}e.config({autoRespond:true,autoRespondAfter:u.delay||r.get("serverDelay")||500});o.simulate(l,{sMockdataBaseUrl:c,bGenerateMissingMockData:true});var m=o.getRequests();var v=function(e,r,t){t.response=function(t){t.respond(e,{"Content-Type":"text/plain;charset=utf-8"},r)}};if(u.metadataError||r.get("metadataError")){m.forEach(function(e){if(e.path.toString().indexOf("$metadata")>-1){v(500,"metadata Error",e)}})}var g=u.errorType||r.get("errorType"),h=g==="badRequest"?400:500;if(g){m.forEach(function(e){v(h,g,e)})}o.setRequests(m);o.start();t.info("Running the app with mock data");s()});f.attachRequestFailed(function(){var e="Failed to load application manifest";t.error(e);c(new Error(e))})})},getMockServer:function(){return o}};return s});