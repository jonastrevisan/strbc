Ext.define('Strbc.view.principal.TabPanel', {
    extend 		: 'Ext.tab.Panel',
    xtype 		: 'StrbcTabPanel',
    id 			: 'tabCenter',
    border 		: true,
    renderTo 	: document.body,
    items 		: [ {
	    xtype 	: 'tabinicio'
    } ],
    plugins 	: Ext.create('Ext.ux.TabCloseMenu')
});