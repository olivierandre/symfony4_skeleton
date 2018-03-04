<template>
<div>
  <div v-if="show">
    <input v-model="firstname" placeholder="edit me">
  </div>
  <div v-if="firstname">
    <div>
      <p>Your firstname is: {{ firstname }}</p>
    </div>
    <button v-on:click="counter += 1">Add 1</button>
    <p>The button above has been clicked {{ counter }} times.</p>
    <button v-on:click="say('Hello')">Say "Hello {{ firstname }}"</button>
  </div>
  <div v-else>
    <p class="waiting">You must wait 2 seconds</p>
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      firstname: null,
      counter: 0,
      show: false
    };
  },
  methods: {
    say(name) {
      alert(name + ' ' + this.firstname);
    },
    addPoint() {
      var waiting = document.querySelector('.waiting');
      waiting.innerText += '.';
    },
    updateFirstname(firstname) {
      this.firstname = firstname;
      this.show = true;
    }
  },
  created() {
    fetch('/api/get/firstname')
      .then((response) => response.json())
      .then(function(data) {
        var self = this;
        var interval = setInterval(self.addPoint, 500);
        setTimeout(function() {
          self.updateFirstname(data.firstname)
          clearInterval(interval);
        }, 2000);
      }.bind(this));
  }
};
</script>
