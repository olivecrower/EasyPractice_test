<template>
    <div class="movies">
        <div class="watch">
            <h3>Movies I want to watch</h3>
            <li v-for="movie in unwatchedMovies" :key="movie.id">
                <fa icon="arrow-circle-right" @click="setWatched(movie.id)" class="text-green-500 cursor-pointer"/>
                <fa icon="times-circle" @click="deleteMovie(movie.id)" class="text-red-500 cursor-pointer"/>
                {{ movie.name }}
            </li>
        </div>
        <div class="watched">
            <h3>Watched movies</h3>
            <li v-for="movie in watchedMovies" :key="movie.id">
                <fa icon="arrow-circle-left" @click="setWatched(movie.id)" class="text-yellow-500 cursor-pointer"/>
                <fa icon="times-circle" @click="deleteMovie(movie.id)" class="text-red-500 cursor-pointer"/>
                {{ movie.name }}
            </li>
        </div>
        <newMovieForm />
    </div>
</template>

<script>
import axios from "axios";
import newMovieForm from "./NewMovie";
export default {
    components: {
        newMovieForm
    },
    created () {
        this.$store.commit('SET_MOVIES_LIST', this.movies)
    },
    props: {
        movies: {}
    },
    computed: {
        watchedMovies() {
            return this.$store.getters.movies.filter(movie => movie.watched == true);
        },
        unwatchedMovies() {
            return this.$store.getters.movies.filter(movie => movie.watched == false);
        }
    },
    methods: {
        setWatched(id) {
            axios.put(`/movies/${id}/watched`).then(response => {
                this.$store.commit('SET_MOVIE_DATA', response.data.movie)
            }).catch(err => {});
        },
        deleteMovie(id) {
            axios.delete(`/movies/${id}`).then(response => {
                this.$store.commit('DELETE_MOVIE_DATA', id);
            });
        }
    }
};
</script>

<style>
    .movies{
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 30px;
    }
    .movies > div{
        padding: 20px;
        border: 1px solid #333;
        border-radius: 3px;
    }
    .add-new input[type="text"]{
        border: 1px solid #333;
        display: block;
        padding: 3px;
        border-radius: 3px;
        width: 100%;
    }
    .add-new button{
        border: 1px solid #333;
        border-radius: 3px;
        padding: 5px 10px;
    }
    h3{
        font-weight: 600;
        font-size: 1.5rem;
    }
    li{
        display: block;
    }
</style>