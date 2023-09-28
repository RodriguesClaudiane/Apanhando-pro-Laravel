<template>
<section>
    <h1>Cadastro de livro</h1>
    <br>
    <form @submit.prevent="cadastroLivro()">
        <label>
            Título:
        </label>
        <input type="text" v-model="livro.titulo" placeholder="Título do livro">
        <br>
        <label>
            Autor:
        </label>
        <input type="text" v-model="livro.autor" placeholder="Autor do livro">
        <br>
        <label>
            Gênero:
        </label>
        <input type="text" v-model="livro.genero" placeholder="Gênero do livro">
        <br>
        <label>
            Quant. de páginas:
        </label>
        <input type="number" v-model="livro.quant_paginas">
        <br>
        <button type="submit">Enviar</button>
    </form>
</section>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
    name: 'CadastrarLivro',
    data(){
        return{
            livro:{
                titulo: "",
                autor: "",
                genero: "",
                quant_paginas: ""
            }
        }
        },
        methods:{
            cadastroLivro(){
                axios.post('http://localhost:8000/api/Livros',{
                    titulo: this.livro.titulo,
                    autor: this.livro.autor,
                    genero: this.livro.genero,
                    quant_paginas: this.livro.quant_paginas
                })
                .then(response => {
                    if(response.data.success){
                        Swal.fire({
                            title: 'Livro cadastrado com sucesso',
                        });
                    }else{
                        Swal.fire({
                            title: 'Erro ao cadastrar livro'
                        })
                        console.log(response.data.error);
                    }
                })
                .catch(error =>{
                    console.log(error)
                })
            }
    }
}
</script>

<style scoped>
</style>