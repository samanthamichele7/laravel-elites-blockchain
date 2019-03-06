<template>
  <div v-if="! loading">
    <div v-if="this.applicant.certified">
      <div
        class="flex items-center justify-center bg-green text-white text-sm font-bold px-4 py-3 mt-4"
      >Laravel Elite</div>
    </div>

    <div v-else>
      <button
        @click="certify"
        class="bg-orange hover:bg-orange-dark text-white font-bold py-2 px-4 rounded-full mt-4"
      >Certify</button>
    </div>
  </div>
</template>

<script>
import Blockchain from "../mixins/blockchain";

export default {
  mixins: [Blockchain],

  props: ["user"],

  watch: {
    contractAddress() {
      this.getApplicant();
    }
  }
};
</script>
