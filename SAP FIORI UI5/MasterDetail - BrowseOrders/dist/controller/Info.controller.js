sap.ui.define(["./BaseController"],function(e){"use strict";return e.extend("opensap.orders.controller.Info",{onInit:function(){this.getRouter().getRoute("Info").attachPatternMatched(this._onInfoMatched,this)},_onInfoMatched:function(e){var t=e.getParameter("arguments").objectId,n=e.getParameter("arguments").itemPosition;this.getModel("appView").setProperty("/layout","ThreeColumnsEndExpanded");this.getModel().metadataLoaded().then(function(){var e=this.getModel().createKey("SalesOrderLineItemSet",{SalesOrderID:t,ItemPosition:n});this.getView().bindElement({path:"/"+e,parameters:{expand:"ToHeader"}})}.bind(this))}})});