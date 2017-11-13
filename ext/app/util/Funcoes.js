Ext.define('Strbc.util.Funcoes', {

    Masc_ou_Fem: function (value, metaData, record) {

        if (record.get('sexo') === 'M') {
            return '<img src="content/ico/user_gray.png" title="Masculino"/> ' + value;
        } else if (record.get('sexo') === 'F') {
            return '<img src="content/ico/user_female.gif" title="Feminino"/> ' + value;

        }
        else {
            return '<img src="content/ico/user_undefined.png" title="Sexo não informado"/> ' + value;
        }
    },
    SIM_NAO_POR_EXTENSO: function (value) {

        if (value === 'S') {
            return 'Sim';
        }
        else {
            return 'Não';
        }
    }
});