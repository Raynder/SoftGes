import { Toast } from "bootstrap";

class Membro {

    constructor() {
        this._membros = [];
    }

    addMembros() {
        var membro = $('.select-membro').text();
        var idMembro = $('.select-membro').val();
        var membrosAtuais = $('.card-membros').html();
        
        if(this._membros.indexOf(idMembro.toString()) > -1) {
            return false;
        }

        this.setMembros(idMembro);

        if (membro != '') {
            $('.card-membros').html(membrosAtuais +
                '<div class="card"><div class="card-header card-membro"><h3 class="card-title">' + membro +
                '</h3></div></div>');
        }
    }

    membrosProjetos(rota, token){
        console.log(token)
        var membros = this.getMembros();
        
        // salvar no banco de dados
        $.ajax({
            url: rota,
            type: 'POST',
            data: {
                _token: token,
                nome: $('#nome').val(),
                descricao: $('#descricao').val(),
                cliente_id: $('.select-cliente').val(),
                membros: membros
            },
            success: function(data) {
                console.log(data);
                location.reload();
            }
        });
    }

    getMembros() {
        return this._membros;
    }

    setMembros(membro) {
        this._membros.push(membro);
    }
    
}

export default Membro;