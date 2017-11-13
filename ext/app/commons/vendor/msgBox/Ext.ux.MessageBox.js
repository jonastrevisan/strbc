Ext.ns('Ext.ux');

Ext.ux.MessageBox =
    function() {
	    var msgCt = null;

	    function createBox(config) {

		    switch (config.type) {
			    case 'info':
			    	config.title = 'Informação',
				    config.time = 2000;
				    break;
			    case 'warning':
			    	config.title = 'Atenção',
			    	config.time = 3500;
				    break;
			    case 'error':
			    	config.title = 'Falhou',
			    	config.time = 3500;
				    break;
			    case 'success':
			    	config.title = 'Sucesso',
			    	config.time = 3500;
				    break;
			    default:
				    break;
		    }

		    return [ '<div class="flash">', '<table class="box ' + config.type + '" cellspacing="0" cellpadding="0" style="width:' + config.width + '">',
		        '<tr><td class="lt"></td><td class="ct"></td><td class="rt"></td></tr>', '<tr><td class="lm" valign="middle" align="center"><div class="icon"></div></td>',
		        '<td class="cm" align="center" valign="middle">', '<div class="msg"><h3>' + config.title + '</h3><p>' + config.msg + '</p></div>', '<td class="rm"></td></tr>',
		        '<tr><td class="lb"></td><td class="cb"></td><td class="rb"></td></tr>', '</table>', '</div>' ].join('');
	    }
	    return {
		    flash : function(config) {

			    Ext.applyIf(config, {
			        msg : 'Text',
			        title : '',
			        type : 'info',
			        time : 2500,
			        msgStyle : '',
			        width : 274
			    });

			    if (config.width < 274) {
				    config.width = 274;
			    }

			    if (!msgCt) {
				    msgCt = Ext.core.DomHelper.insertFirst(document.body, {
				        id : 'msg-flash',
				        align : 'center'
				    }, true);
			    }

			    var m = Ext.core.DomHelper.append(msgCt, createBox(config), true);

			    m.hide();
			    m.slideIn('t').ghost("t", {
			        delay : config.time,
			        remove : true
			    });
		    }

	    };
    }();

Ext.ux.Msg = Ext.ux.MessageBox;