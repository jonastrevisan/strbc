Ext.define('Strbc.model.Socio', {

    extend : 'Strbc.commons.abstract.Model',

    fields: ['sexo',

            'admissao',

            'ativo',

            'certificadoreserv',

            'cidadeatual',

            'cpf',

            'datacad',

            'dataemissao1',

            'dataemissao2',

            'datanasc1',

            'datanasc2',

            'datanasc3',

            'datanasc4',

            'datanasc5',

            'datanasc6',
			
			{
			dateFormat: 'Y-m-d',
			name: 'datanascimento',
			type: 'date'
			}
			,

            'endereco1',

            'endereco2',

            'estado',

            'estcivil',

            'inscricao',

            'mae',

            'matricula',

            'nacionalidademae',

            'nacionalidadepai',

            'naturalidade',

            'nome',

            'nomedependente1',

            'nomedependente2',

            'nomedependente3',

            'nomedependente4',

            'nomedependente5',

            'nomedependente6',

            'obs',

            'pai',

            'parentesco1',

            'parentesco2',

            'parentesco3',

            'parentesco4',

            'parentesco5',

            'parentesco6',

            'propriedade1',

            'propriedade2',

            'proprietario1',

            'proprietario2',

            'prsocial',

            'rg',

            'serie',
			'linha'



    ]

});