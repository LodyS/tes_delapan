<template>
    <div>
        <input @input="startTyping" />
        <div>
            <small v-if="isTyping">User is typing...</small>
        </div>
  </div>
</template>

<script>
import debounce from "lodash/debounce";

export default {
    data() {
        return {
            isTyping: false,
        };
    },
    methods: {
        startTyping() {
            this.isTyping = true;
            this.debounceStopTyping();
        },
    
        debounceStopTyping: debounce(function () {
            this.isTyping = false;
        }, 500),
    },
};
</script>