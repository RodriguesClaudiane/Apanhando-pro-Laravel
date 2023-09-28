<template>
<h1>Bosta</h1>
<div class="Mostrar-acervo">
    <ul class="Livro" v-for='livros in livro' :key="livros.id">
        <strong>Titulo:</strong>
        {{ livros.titulo }}
        <br>
        <strong>Autor:</strong>
        {{ livros.autor }} 
        <br>
        <strong>Gênero:</strong>
        {{ livros.genero }} 
        <br>
        <strong>Quantidade de páginas:</strong>
        {{ livros.quant_paginas }} 
        <br>
        <strong>Status:</strong>
        {{ livros.disponibilidade }}
</ul>
</div>
</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
    data(){
        return{
            livro: []
        }
    },
    methods:{
        exibirLivros(){
            axios.get('http://localhost:8000/api/Livros')
            .then(response =>{
                console.log(response)
                if(response.data.success){
                    this.livro = response.data.livro
                    return
                }else{
                    Swal.fire({
                        title: 'Erro ao carregar o acervo'
                    })
                }
            })
        }
    },
    created(){
        this.exibirLivros()
    }
}
</script>
<style>
.Mostrar-acervo{
    display:flex;
    gap: 0.6em;
    align-content: flex-start;
    flex-direction: column;

}
.Livro{
  border-style: double;
  border-radius: 0.8em;
  border-width: 0.1em;
  min-width: 50em;
  max-width: 50em;
  padding: 1em;
}
</style>