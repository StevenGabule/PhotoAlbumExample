<template>
  <q-card class="my-card q-mr-md q-mb-md" style="width: 300px">
    <q-card-section class="bg-primary text-white">
      <div class="text-h6 text-capitalize">{{data.title}}</div>
    </q-card-section>

    <q-separator/>

    <q-card-actions align="right">
      <q-btn :to="{name: 'edit_album', params: {id: data.id}}" flat>Edit</q-btn>
      <q-btn @click="destroy(data.id)" flat>Delete</q-btn>
      <q-btn :to="{name: 'photos', params: {id: data.id}}" flat>View Photos</q-btn>
    </q-card-actions>
  </q-card>
</template>

<script>
import { api } from 'boot/axios'

export default {
  name: 'AlbumCard',
  props: ['album'],
  data () {
    return {
      data: this.album
    }
  },
  methods: {
    destroy (id) {
      api.delete(`/albums/${id}`).then(response => {
        window.location.reload()
      })
    }
  }
}
</script>
