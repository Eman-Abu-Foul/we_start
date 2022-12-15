import { defineStore } from 'pinia'

export const useUserStore = defineStore({
  id: 'counter',
  state: () => ({
    user: null
  }),
  getters: {
    doubleCount: (state) => state.user
  },
  actions: {
    increment() {
      this.user = this.user
    },
    persist: true,
  }
})