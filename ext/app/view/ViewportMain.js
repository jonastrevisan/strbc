Ext.define('Strbc.view.ViewportMain', {
    extend 		: 'Ext.container.Viewport',
    requires 	: [ 
        'Ext.layout.container.Border', 
        'Strbc.view.principal.Tree', 
        'Strbc.view.principal.TabPanel' 
    ],
    
    alias 	: 'widget.viewportmain',
    layout 	: 'border',
    
    items 	: [ {
        xtype 	: 'StrbcToolbar',
        region 	: 'north'
    }, {        
        xtype : 'StrbcTabPanel',
        region : 'center'
    }, {
        xtype : 'StrbcMenu',
        region : 'west'
    }]
});