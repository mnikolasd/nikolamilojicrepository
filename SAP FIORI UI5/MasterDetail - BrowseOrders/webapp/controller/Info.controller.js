sap.ui.define([
	"./BaseController"
], function (BaseController) {
	"use strict";

	return BaseController.extend("opensap.orders.controller.Info", {

		/**
		 * Called when a controller is instantiated and its View controls (if available) are already created.
		 * Can be used to modify the View before it is displayed, to bind event handlers and do other one-time initialization.
		 * @memberOf opensap.orders.view.Info
		 */
		onInit: function () {
			this.getRouter().getRoute("Info").attachPatternMatched(this._onInfoMatched, this);
		},

		/**
		 * Called when a controller is instantiated and its View controls (if available) are already created.
		 * Can be used to modify the View before it is displayed, to bind event handlers and do other one-time initialization.
		 * @memberOf opensap.orders.view.Info
		 */
		_onInfoMatched: function (oEvent) {
			var sObjectId = oEvent.getParameter("arguments").objectId,
				sItemPosition = oEvent.getParameter("arguments").itemPosition;
			this.getModel("appView").setProperty("/layout", "ThreeColumnsEndExpanded");
			this.getModel().metadataLoaded().then(function () {
				var sObjectPath = this.getModel().createKey("SalesOrderLineItemSet", {
					SalesOrderID: sObjectId,
					ItemPosition: sItemPosition
				});
				this.getView().bindElement({
					path: "/" + sObjectPath,
					parameters: {
						'expand': 'ToHeader'
					}
				});
			}.bind(this));
		}

	});

});