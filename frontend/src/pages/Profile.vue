<template>
  <q-page class="q-pl-md">
    <div class="flex justify-between q-mb-lg">
      <h5 class="q-my-sm">Profile</h5>
      <q-btn :to="{ name: 'new_album', params: {id: this.pid} }" class="q-mt-sm q-mr-sm">New album</q-btn>
    </div>
    <q-list bordered separator>
      <q-item>
        <q-item-section>
          <q-item-label overline>NAME</q-item-label>
          <q-item-label>{{this.profile.name}}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item>
        <q-item-section>
          <q-item-label overline>USERNAME</q-item-label>
          <q-item-label>{{this.profile.username}}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item>
        <q-item-section>
          <q-item-label overline>Email</q-item-label>
          <q-item-label>{{this.profile.email}}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item>
        <q-item-section>
          <q-item-label overline>Address</q-item-label>
          <q-item-label>
            {{ this.profile.address.full_address }}
          </q-item-label>
        </q-item-section>
      </q-item>
      <q-item>
        <q-item-section>
          <q-item-label overline>Phone</q-item-label>
          <q-item-label>{{this.profile.phone}}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item>
        <q-item-section>
          <q-item-label overline>Website</q-item-label>
          <q-item-label><a :href="website" target="_blank">View Website</a></q-item-label>
        </q-item-section>
      </q-item>
      <q-item>
        <q-item-section>
          <q-item-label overline>Company - {{ this.profile.company.name}}</q-item-label>
          <q-item-label caption>
            {{ this.profile.company.catch_phrase}}, {{ this.profile.company.bs}},
          </q-item-label>
        </q-item-section>
      </q-item>
    </q-list>

    <h5 class="q-my-sm">Albums</h5>
    <div class="flex justify-between">
      <AlbumCard v-for="(album, index) in albums" :key="index" :album="album"></AlbumCard>
    </div>
  </q-page>
</template>

<script>
import { api } from 'boot/axios'
import AlbumCard from 'components/Albums/Card'

export default {
  name: 'Profile',
  components: { AlbumCard },
  props: ['id'],
  data () {
    return {
      pid: this.id,
      profile: [],
      albums: []
    }
  },

  created () {
    this.fetchProfile()
  },

  computed: {
    website () {
      return `//www.${this.profile.website}`
    }
  },

  methods: {
    fetchProfile () {
      api.get(`/user/${this.pid}`).then(({ data }) => {
        this.profile = data
        this.albums = data.albums
      })
    }
  }
}
</script>
