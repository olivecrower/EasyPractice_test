<template>
    <div class="add-new">
        <h3>Add new movie to list</h3>
        <input type="text" v-model="form.name" placeholder="Title" />
        <span class="text-red-500" v-if="errors.name">{{
            errors.name[0]
        }}</span>
        <p>
          <input type="checkbox" id="watched" v-model="form.watched" />
          Have you seen this movie?
        </p>
        <button @click="submit">Save</button>
    </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null,
        watched: false
      },
      errors: {}
    };
  },
  methods: {
    submit() {
      axios
        .post("/movies", this.form)
        .then(response => {
            this.form = {
              name: null,
              watched: false
            };
            this.$store.commit('ADD_MOVIE_DATA', response.data.movie)
        })
        .catch(err => {
            this.errors = err.response.data.errors;
        });
    }
  }
};
</script>
