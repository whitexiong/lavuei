<script setup>
import FullScreenSection from '../Components/FullScreenSection.vue'
import CardComponent from '../Components/CardComponent.vue'
import Divider from '../Components/Divider.vue'
import JbButton from '../Components/JbButton.vue'
import JbButtons from '../Components/JbButtons.vue'
</script>

<template>
  <full-screen-section
    v-slot="{ cardClass, cardRounded }"
    bg="error"
  >
    <card-component
      :class="cardClass"
      :rounded="cardRounded"
    >
      <div class="space-y-3">
        <h1 class="text-2xl">
          Unhandled exception
        </h1>

        <p>An Error Occurred</p>
      </div>

      <divider />

      <jb-buttons>
        <jb-button
          label="Done"
          to="/"
          color="danger"
        />
      </jb-buttons>
    </card-component>
  </full-screen-section>
</template>
