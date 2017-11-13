Ext.require('Strbc.view.autenticacao.Container');

Ext.define('Strbc.view.ViewportAuth', {
	extend 	: 'Ext.container.Viewport',
	title 	: 'Strbc Strbc',
	layout 	: 'border',

	items 	: [{
		xtype 	: 'panel',
		itemId 	: 'auth-viewport',
		flex 	: 4,
		region 	: 'center',
		border 	: true,
		frame 	: true,
		margin 	: 0,
		layout 	: {
			type : 'fit'
		},
		bodyBorder : true,
		title 	: 'Strbc',
		items 	: [{
			xtype 		: 'image',
			autoRender 	: false,
			fixed 		: true,
			src 		: 'content/img/banner/centro.jpg'
		}]
	}, {
		xtype 		: 'logincontainer',
		frame 		: true,
		bodyBorder 	: true,
		margin 		: 0
	}, {
		xtype 		: 'panel',
		region 		: 'south',
		frame 		: true,
		bodyBorder 	: true,
		height 		: 80,
		title 		: '',
		items 		: [{
			xtype 	: 'image',
			fixed 	: true,
			src 	: 'content/img/banner/rodape.jpg'
		}]
	}, {
		xtype 	: 'image',
		region 	: 'north',
		height 	: 80,
		margin 	: 0,
		src 	: 'content/img/banner/topo.jpg'
	}]

});