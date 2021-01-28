<template>
  <q-card class="my-card q-mb-lg" style="width: 300px;">
    <q-img
      :src="this.data.thumbnail_url"
      basic
    >
      <div class="absolute-bottom text-subtitle2 text-center text-capitalize">
        {{this.data.title}}

        <q-card-actions align="right">
          <q-btn :to="{name: 'edit_photo', params: {id: data.id, pid: this.pids } }" flat>Edit</q-btn>
          <q-btn  @click="destroy(data.id)" flat>Delete</q-btn>
        </q-card-actions>

      </div>
    </q-img>
  </q-card>
</template>

<script>
import { api } from 'boot/axios'

export default {
  name: 'PhotoCard',
  props: ['photo', 'pid'],
  data () {
    return {
      data: this.photo,
      pids: this.pid
    }
  },
  methods: {
    destroy (id) {
      api.delete(`/photos/${this.data.id}`).then(response => {
        window.location.reload()
      })
    }
  }
}
</script>
