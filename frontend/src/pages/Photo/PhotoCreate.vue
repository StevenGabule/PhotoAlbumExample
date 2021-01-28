<template>
  <q-page class="q-pl-md">
    <h5>Create a new photo</h5>
    <q-form
      @submit="onSubmit"
      @reset="onReset"
      class="q-gutter-md"
    >
      <q-input
        filled
        v-model="title"
        label="Your name *"
        hint="Title of photo"
        lazy-rules
        :rules="[ val => val && val.length > 0 || 'Please type something']"
      />

      <q-input
        filled
        v-model="url"
        label="Url"
        hint="Your original url"
        lazy-rules
        :rules="[ val => val && val.length > 0 || 'Please type something']"
      />

      <q-input
        filled
        v-model="thumbnail_url"
        label="Thumbnail URL"
        hint="Your thumbnail url"
        lazy-rules
        :rules="[ val => val && val.length > 0 || 'Please type something']"
      />

      <div>
        <q-btn label="Submit" type="submit" color="primary"/>
        <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" />
      </div>
    </q-form>
  </q-page>
</template>

<script>
import { api } from 'boot/axios'

export default {
  name: 'PhotoCreate',
  props: ['id'],
  data () {
    return {
      title: null,
      url: null,
      thumbnail_url: null,
      album_id: this.id
    }
  },
  methods: {
    onSubmit () {
      api.post('/photos', {
        album_id: this.album_id,
        thumbnail_url: this.thumbnail_url,
        url: this.url,
        title: this.title
      }).then(() => {
        this.$router.push({ path: `/photos/${this.album_id}` })
        // console.log(data)
        // routes({ path: '/profile' })
      })
    },

    onReset () {
      this.title = null
      this.url = null
      this.thumbnail_url = null
    }
  }
}
</script>
