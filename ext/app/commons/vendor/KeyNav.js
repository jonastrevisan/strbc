new Ext.KeyNav(document,
{
    enter: function (e, f, g, h) {
        var target = e.getTarget();
        if (target.form) {
            e.stopEvent();
            var els = target.form.elements, len = target.form.length;
            for (var p = 0; p < len; p++) {
                if (els[p] == target) {
                    break;
                }
            }
            if (e.getKey() == Ext.EventObject.ENTER && target.type == 'button') {
                try {
                    target.click();
                }
                catch (err) { }
            }
            else {
//                if (e.getKey() == Ext.EventObject.ENTER) {
//                    //elemento atual
//                    try {
//                        Ext.getCmp(els[0].name).triggerBlur();
//                    }
//                    catch (err) {
//                    }
//                }
                for (var i = 1; i < len; i++) {
                    var el = els[++p % len];
                    try {
                        if (el != undefined)
                            if (Ext.getCmp(el.id).hidden == true) {
                                el.style.visibility = "hidden";
                            }
                    }
                    catch (erro) { }
                    if (el.style.display != 'none' && el.style.visibility != 'hidden' && !el.disabled && el.type != 'hidden' && el.type != 'fieldset' && el.type != undefined && el.type != 'readOnly') {
                        try {

                            el.focus();
                        }
                        catch (err) {
                            var elx = els[0 % len];
                            elx.focus();
                        }
                        break;
                    }
                }
            }
        }
    }
});

Ext.form.ComboBox.override({
    getSelectedIndex: function () {
        var r = this.findRecord(this.forceSelection ? this.valueField : this.displayField, this.forceSelection ? this.getValue() : this.getRawValue());

        return (!Ext.isEmpty(r)) ? this.indexOfEx(r) : -1;
    }
});