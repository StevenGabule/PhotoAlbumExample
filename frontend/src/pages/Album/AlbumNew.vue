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
        <q-btn label="Submit" type="submit" color="primary"/>
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
  methods: {
    onSubmit () {
      api.post('/albums', {
        user_id: this.pid,
        title: this.title
      }).then(({ data }) => {
        this.$router.push({ path: `/profile/${this.pid}` })
        // console.log(data)
        // routes({ path: '/profile' })
      })
    },

    onReset () {
      this.title = null
    }
  }
}
</script>
