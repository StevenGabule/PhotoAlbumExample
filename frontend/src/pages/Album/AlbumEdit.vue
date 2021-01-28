<template>
  <q-page class="q-pl-md">
    <h5>Create a new album</h5>
    <q-form
      @submit="onSubmit"
      @reset="onReset"
      class="q-gutter-md"
    >
      <q-input
        filled
        v-model="title"
        label="Your name *"
        hint="Name and surname"
        lazy-rules
        :rules="[ val => val && val.length > 0 || 'Please type something']"
      />

      <div>
        <q-btn label="Update" type="submit" color="primary"/>
        <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
      </div>
    </q-form>
  </q-page>
</template>

<script>
import { api } from 'boot/axios'

export default {
  name: 'AlbumNew',
  props: ['id'],
  data () {
    return {
      title: null,
      pid: this.id
    }
  },

  created () {
    this.fetchAlbum()
  },

  methods: {
    onSubmit () {
      api.put(`/albums/${this.pid}`, {
        title: this.title
      }).then(_ => {
        this.$router.push({ path: `/profile/${this.pid}` })
      })
    },

    fetchAlbum () {
      api.get(`/albums/${this.pid}`).then(({ data }) => {
        this.title = data.title
      })
    },

    onReset () {
      this.title = null
    }
  }
}
</script>
