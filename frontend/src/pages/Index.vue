<template>
  <q-page class="q-pa-lg">
    <h5 class="q-mt-none q-mb-none">All the users</h5>
    <p class="text-dark text-capitalize">View all the users album and photos</p>
    <div class="flex justify-between">
      <Card v-for="(user, index) in users" :key="index" :user="user"></Card>
    </div>
  </q-page>
</template>

<script>
import { api } from 'boot/axios'
import Card from 'components/Users/Card'

export default {
  name: 'PageIndex',
  components: { Card },
  data () {
    return {
      users: []
    }
  },

  created () {
    this.fetchUsers()
  },

  methods: {
    fetchUsers () {
      api.get('/users').then(({ data }) => {
        this.users = data
      })
    }
  }
}
</script>
