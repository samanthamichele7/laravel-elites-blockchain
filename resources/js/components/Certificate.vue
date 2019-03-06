<template>
  <div class="flex justify-center text-center">
    <div class="max-w-4xl rounded overflow-hidden shadow-lg bg-white m-8 px-8 py-8">
      <div class="border-2 p-16" v-if="! loading">
        <div v-if="this.applicant.certified">
          <h2
            class="text-grey-darker font-thin text-4xl mb-6 pt-8 pb-4"
          >Certificate of Laravel Elite Status</h2>
          <img :src="user.avatar" class="h-32 w-32 mb-8" v-if="user.avatar">
          <p class="italic">This is to certify that</p>

          <p class="text-2xl py-4">
            <a
              :href="`https://github.com/${user.github_username}`"
              target="__blank"
              class="text-orange-darker"
            >{{ user.name }}</a>
          </p>

          <p class="italic">
            is an official member of the
            <strong>Laravel Elite</strong>
          </p>
        </div>

        <div v-else>
          <img :src="user.avatar" class="h-32 w-32 mb-8" v-if="user.avatar">
          <p class="text-2xl py-4">
            <a
              :href="`https://github.com/${user.github_username}`"
              target="__blank"
              class="text-orange-darker"
            >{{ user.name }}</a>
          </p>

          <p class="italic">is not currently a member of the Laravel Elite</p>
        </div>
      </div>
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