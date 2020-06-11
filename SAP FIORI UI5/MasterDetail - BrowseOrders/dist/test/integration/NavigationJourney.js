sap.ui.define(["sap/ui/test/opaQunit","./pages/Master","./pages/Detail","./pages/Browser","./pages/App","./pages/Info"],function(e){"use strict";QUnit.module("Desktop navigation");e("Should navigate on press",function(e,o,t){e.iStartMyApp();o.onTheMasterPage.iRememberTheIdOfListItemAtPosition(1).and.iPressOnTheObjectAtPosition(1);t.onTheDetailPage.iShouldSeeTheRememberedObject().and.iShouldSeeHeaderActionButtons();t.onTheBrowserPage.iShouldSeeTheHashForTheRememberedObject()});e("Should press full screen toggle button: The app shows one column",function(e,o,t){o.onTheDetailPage.iPressTheHeaderActionButton("enterFullScreen");t.onTheAppPage.theAppShowsFCLDesign("MidColumnFullScreen");t.onTheDetailPage.iShouldSeeTheFullScreenToggleButton("exitFullScreen")});e("Should press full screen toggle button: The app shows two columns",function(e,o,t){o.onTheDetailPage.iPressTheHeaderActionButton("exitFullScreen");t.onTheAppPage.theAppShowsFCLDesign("TwoColumnsMidExpanded");t.onTheDetailPage.iShouldSeeTheFullScreenToggleButton("enterFullScreen")});e("Should react on hash change",function(e,o,t){o.onTheMasterPage.iRememberTheIdOfListItemAtPosition(1);o.onTheBrowserPage.iChangeTheHashToTheRememberedItem();t.onTheDetailPage.iShouldSeeTheRememberedObject().and.iShouldSeeNoBusyIndicator();t.onTheMasterPage.theRememberedListItemShouldBeSelected()});e("Detail Page Shows Object Details",function(e,o,t){t.onTheDetailPage.iShouldSeeTheObjectLineItemsList().and.theDetailViewShouldContainOnlyFormattedUnitNumbers().and.theLineItemsListShouldHaveTheCorrectNumberOfItems().and.theLineItemsHeaderShouldDisplayTheAmountOfEntries()});e("Navigate to an object not on the client: no item should be selected and the object page should be displayed",function(e,o,t){o.onTheMasterPage.iRememberAnIdOfAnObjectThatsNotInTheList();o.onTheBrowserPage.iChangeTheHashToTheRememberedItem();t.onTheDetailPage.iShouldSeeTheRememberedObject()});e("Should press close column button: The app shows one columns",function(e,o,t){o.onTheDetailPage.iPressTheHeaderActionButton("closeColumn");t.onTheAppPage.theAppShowsFCLDesign("OneColumn");t.onTheMasterPage.theListShouldHaveNoSelection();t.iTeardownMyApp()});e("Start the App and simulate metadata error: MessageBox should be shown",function(e,o,t){e.iStartMyApp({delay:1e3,metadataError:true});t.onTheAppPage.iShouldSeeTheMessageBox();o.onTheAppPage.iCloseTheMessageBox();t.iTeardownMyApp()});e("Start the App and simulate bad request error: MessageBox should be shown",function(e,o,t){e.iStartMyApp({delay:1e3,errorType:"serverError"});t.onTheAppPage.iShouldSeeTheMessageBox();o.onTheAppPage.iCloseTheMessageBox();t.iTeardownMyApp()})});