function update() {
    $.ajax({
        url: 'http://localhost:3000/lib/Ramal.php',
        type: 'GET',
        success: function(data) { 
            $('#cartoes').empty()
            $('#updateTime').empty()            
            
            for(let i in data) {
                if(data[i].status === 'offline') {
                    $('#cartoes').append(`
                        <div class="cartao bg-secondary" title="${data[i].nome} ${data[i].status}">
                            <div class="font-weight-bold">${data[i].nome}</div>
                            <p class="text-center text-uppercase h4">${data[i].user}</p>
                            <p class="text-center text-uppercase h6">${data[i].status}</p>
                            <span class="${data[i].status} icone-posicao"></span>
                        </div>
                    `)
                } 
                else if (data[i].status === 'pause') body()
                else body()
            
                function body() {
                    $('#cartoes').append(`
                        <div class="cartao" title="${data[i].nome} ${data[i].status}">
                            <div class="font-weight-bold">${data[i].nome}</div>
                            <p class="text-center text-uppercase h4">${data[i].user}</p>
                            <p class="text-center text-uppercase h6">${data[i].status}</p>
                            <span class="${data[i].status} icone-posicao"></span>
                        </div>
                    `)
                }
            }

            let n = new Date()
            $('#updateTime').append(`<strong>Ultima atualização</strong>: ${n.toLocaleDateString('pt-BR')} ${n.toLocaleTimeString('pt-BR')}`)
            
        }, error: function() {
            console.log("Errouu!")
        }
    })
}

// Função para obter data e hora atualizando a cada segundo
function start() {
    let now = new Date()
    let f = $('#now')
    f.append(`<strong>Data e Hora atual</strong>: ${now.toLocaleDateString('pt-BR')} ${now.toLocaleTimeString('pt-BR')}`)
    setTimeout(() => {
        f.empty()
        start()
    }, 1000)
}

start()
update()
setInterval(update, 10000)