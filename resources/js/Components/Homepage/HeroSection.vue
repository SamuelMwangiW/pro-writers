<template>
  <section class="w-full px-8 py-16 xl:px-8 bg-gray-50">
    <div class="max-w-5xl mx-auto">
      <div class="flex flex-col items-center md:flex-row">

        <div class="w-full space-y-5 md:w-3/5 md:pr-16">
          <p class="font-medium text-blue-500 uppercase">Building Businesses</p>
          <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
            Changing The Way People Do ......
          </h2>
          <p class="text-xl text-gray-600 md:pr-16">Learn how to engage with your visitors and teach them
            about your mission. We're revolutionizing the way customers and businesses interact.</p>
        </div>

        <div class="w-full mt-16 md:mt-0 md:w-2/5">
          <div
              class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
            <h3 class="mb-6 text-2xl font-medium text-center">Order Now!</h3>
            <form action="" @submit.prevent="form.post(route('student.order.draft'))">
              <div class="w-full block md:flex items-center md:space-x-4">
                <select
                    name="academic_level_id"
                    class="block w-full md:w-1/2 px-4 py-1 mb-4 rounded-lg focus:ring-sm focus:ring-blue-500 focus:outline-none"
                    v-model="form.academic_level_id"
                    required="required"
                >
                  <option value="">Academic Level</option>
                  <option v-for="(option,index) in academicLevels" :key="index" :value="index">{{ option }}</option>
                </select>
                <select
                    name="deadline"
                    class="block w-full md:w-1/2 px-4 py-1 mb-4 rounded-lg focus:ring-sm focus:ring-blue-500 focus:outline-none"
                    v-model="form.deadline"
                    required="required"
                >
                  <option value="">Deadline</option>
                  <option v-for="(option,index) in deadlines" :key="index" :value="index">{{ option }}</option>
                </select>
              </div>
              <div class="w-full block md:flex items-center md:space-x-4">
                <select
                    name="paper_type_id"
                    class="block w-full px-4 py-1 mb-4 rounded-lg focus:ring-sm focus:ring-blue-500 focus:outline-none"
                    v-model="form.paper_type_id"
                    required="required"
                >
                  <option value="">Select</option>
                  <option v-for="(option,index) in paperTypes" :key="index" :value="index">{{ option }}</option>
                </select>
              </div>
              <div class="mb-3">
                <div class="relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">
                      Pages
                    </span>
                  </div>
                  <input
                      type="text"
                      min="1"
                      step="1"
                      name="pages"
                      v-model="form.pages"
                      class="focus:outline-none focus:ring-sm block w-full pl-16 sm:text-sm rounded-md"
                      placeholder="1"
                      required="required">
                </div>
                <p class="text-sm text-gray-400 px-3">{{ form.pages }} page(s) / {{ words }} Words</p>
              </div>
              <div class="w-full block mb-4 md:flex items-center md:space-x-4">
                <label for="single-spacing">
                  <input type="radio" name="spacing" value="1" v-model="form.spaces" required="required"
                         id="single-spacing">
                  Single Spacing
                </label>
                <label for="double-spacing">
                  <input type="radio" name="spacing" value="2" v-model="form.spaces" required="required"
                         id="double-spacing">
                  Double Spacing
                </label>
              </div>
              <div class="block">
                <button class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg" :disabled="form.processing">
                  Order
                </button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>
<script>
import {useForm} from "@inertiajs/inertia-vue3";
import Select from "../../Components/Form/Select.vue";

export default {
  name: 'hero-section',
  components: {Select},
  props: {
    academicLevels: Object,
    paperTypes: Object,
    deadlines: Object,
  },
  data: () => ({
    action: route('admin.dashboard'),
    form: useForm({
      paper_type_id: '',
      academic_level_id: '',
      deadline: '',
      spaces: 1,
      pages: 1
    }),
  }),
  computed: {
    words() {
      return this.form.pages * (550 / this.form.spaces);
    }
  }
}
</script>
