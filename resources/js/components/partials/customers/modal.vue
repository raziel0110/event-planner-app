<template>
  <transition name="slide-fade">
    <div v-if="show" class="modal_custom">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ customer.created_at ? 'Edit' : 'New'}} Customer</h5>
            <button type="button" class="close" aria-dismiss="Close" @click="closeModal"></button>
          </div>
          <div class="modal-body">
            <div v-if="saveMessageSuccess" class="alert alert-success" role="alert">
            {{saveMessageSuccess}}
            </div>

            <div v-if="saveMessageAlert" class="alert alert-danger" role="alert">
            {{saveMessageAlert}}
            </div>

            <form>
              <div class="mb-3">
                <label for="name" class="form-label"
                  >Name:</label
                >
                <input
                  type="text"
                  class="form-control form-control-sm"
                  id="name"
                  name="name"
                  v-model="customer.name"
                />
              </div>

              <div class="mb-3">
                <label for="email" class="form-label"
                  >Email:</label
                >
                <input
                  type="email"
                  class="form-control form-control-sm"
                  id="email"
                  name="email"
                  v-model="customer.email"
                />
              </div>

              <div class="mb-3">
                <label for="phone" class="form-label"
                  >Phone:</label
                >
                <input
                  type="text"
                  class="form-control form-control-sm"
                  id="phone"
                  name="phone"
                  v-model="customer.phone"
                />
              </div>


              <div class="mb-3">
                <label for="address" class="form-label"
                  >Address:</label
                >
                <input
                  type="text"
                  class="form-control form-control-sm"
                  id="address"
                  name="address"
                  v-model="customer.address"
                />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="closeModal">
              Close
            </button>
            <button type="button" class="btn btn-primary" @click="saveCustomer">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "Modal",
  props: {
    value: {
      type: [Object, Boolean]
    },

  },

  data() {
      return {
            loading: false,
            customer: {...this.value},
            saveMessageSuccess: null,
            saveMessageAlert: null
      }
  }, 

  computed: {
      show: {
        get() {
          return !!this.value;
        },
        set(val) {
            this.$emit('input', val);
        }
      },
  },

  methods: {
    closeModal() {
      this.show = false;
    },

    async saveCustomer() {
        this.loading = true;

        try {
            const response = await axios.post('/api/customers', this.customer)
            if (response.data && response.data.customer) {
                this.$emit('saveCustomer', response.data.customer)
            } else {
                this.saveMessageAlert = "Something went wrong. Please contact the support team.";
            }
        } catch (error) {
            console.log(error);
        } finally {
            this.loading = false;
        }
    },

    async updateCustomer() {
      this.loading = true;

      try {

      } catch(err) {

      } finally {
        this.loading = false;
      }
    },

    saveOrEdit() {
      if(this.customer.id) {
        this.updateCustomer();
      } else {
        this.saveCustomer();  
      }
    }

  },
};
</script>

<style scoped>
.modal_custom {
  display: block;
  position: fixed;
  top:0;
  bottom: 0;
  right: 0;
  left: 0;
  width: 100%;
  margin: 0 auto;
  z-index:20;
}


.slide-fade-enter-active {
  transition: all 0.3s ease;
}
.slide-fade-leave-active {
  transition: all 0.5s cubic-bezier(1, 0.5, 0.5, 1);
}
.slide-fade-enter, .slide-fade-leave-to
 {
  transform: translateX(20px);
  opacity: 0;
}
</style>