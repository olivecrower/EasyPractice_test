import Vue from 'vue'
import Vuex from 'vuex'
import { mapGetters } from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    movies: []
  },
  mutations: {
    SET_MOVIES_LIST (state, list) {
      state.movies = list
    },
    SET_MOVIE_DATA (state, data) {
      const index = state.movies.map(item => item.id).indexOf(data.id);
      if(index !== -1) {
        state.movies.splice(index, 1);
        state.movies.unshift(data);
      }
    },
    ADD_MOVIE_DATA (state, data) {
      state.movies.unshift(data);
    },
    DELETE_MOVIE_DATA(state, id) {
      const index = state.movies.map(item => item.id).indexOf(id);
      if(index !== -1) {
        state.movies.splice(index, 1);
      }
    }
  },
  actions: {
  },
  getters: {
    movies: state => state.movies
  }
})

export default store