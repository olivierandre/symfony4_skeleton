<template>
<div>
  <div>
    <input v-model="firstname" placeholder="edit me">
  </div>
  <div v-if="firstname">
    <div>
      <p>Message is: {{ firstname }}</p>
    </div>
    <button v-on:click="counter += 1">Add 1</button>
    <p>The button above has been clicked {{ counter }} times.</p>
    <button v-on:click="say('Hello')">Say "Hello {{ firstname }}"</button>
  </div>
</div>
</template>

<script>
export default {
  name: "vue",
  data() {
    return {
      firstname: null,
      counter: 0,
      show: true
    };
  },
  methods: {
    say(name) {
      alert(name + ' ' + this.firstname);
    }
  },
  created() {
    fetch('/api/get/firstname')
      .then((response) => response.json())
      .then(function(data) {
        var self = this;
        setTimeout(function() {
          self.firstname = data.firstname;
        }, 2000);
      }.bind(this));
  }
};
</script>
