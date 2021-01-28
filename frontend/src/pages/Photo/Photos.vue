<template>
  <q-page class="q-pl-md">
    <div class="flex justify-between q-mb-lg">
      <h5 class="q-my-sm">Photos</h5>
      <q-btn :to="{ name: 'new_photo', params: {id: this.pid} }" class="q-mt-sm q-mr-sm">New Photo</q-btn>
    </div>
    <div class="flex justify-between q-mr-sm">
      <PhotoCard v-for="(photo, index) in data.photos" :photo="photo" :pid="pid" :key="index"></PhotoCard>
    </div>
  </q-page>
</template>

<script>
import { api } from 'boot/axios'
import PhotoCard from 'components/Photos/Card'

export default {
  name: 'Photos',
  components: { PhotoCard },
  props: ['id'],
  data () {
    return {
      pid: this.id,
      data: []
    }
  },

  created () {
    this.fetchPhotos()
  },

  methods: {
    fetchPhotos () {
      api.get(`/album/${this.pid}`).then(({ data }) => {
        this.data = data
      })
    }
  }
}
</script>
