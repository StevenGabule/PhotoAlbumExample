<template>
  <q-card class="my-card q-mr-md q-mb-md" style="width: 300px">
    <q-card-section class="bg-indigo text-white">
      <div class="text-h6">{{data.name}}</div>
    </q-card-section>

    <q-separator/>

    <q-card-actions align="right">
      <q-btn :to="{name: 'profile', params: {id: data.id}}" flat>View Profile</q-btn>
    </q-card-actions>
  </q-card>
</template>

<script>
export default {
  name: 'Card',
  props: ['user'],
  data () {
    return {
      data: this.user
    }
  }
}
</script>
