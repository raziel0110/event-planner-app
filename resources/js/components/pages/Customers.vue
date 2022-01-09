<template>
  <div class="container mt-3 ml-3">
    <div class="d-flex justify-content-between">
      <h1 class="display-6">Customers</h1>
      <div>
        <button class="btn btn-primary" @click="saveOrEditCustomer(null)">
          <i class="bi bi-plus-lg"></i>
          Add
        </button>
      </div>
    </div>

    <Modal v-model="selectedCustomer" @saveCustomer="updateCustomerList" />


    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="customer in customers" :key=customer.id>
              <td>{{customer.email}}</td>
          </tr>  
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Modal from "../partials/customers/modal.vue";

import defaultCustomer from "../partials/customers/defaultCustomer";

export default {
  name: "Customers",
  components: {
    Modal,
  },
  data() {
    return {
      loading: false,
      customers: [],
      selectedCustomer: null,
    };
  },

  created() {
    this.fetchCustomers();
  },
  methods: {
    saveOrEditCustomer(val) {
      this.selectedCustomer = val ? val : defaultCustomer;
    },

    updateCustomerList(e) {
      this.customers.push(e);
    },

    async fetchCustomers() {
      this.loading = true;

      try {
        const response = await axios.get("/api/customers");
        if (response.data && response.data.customers) {
          this.customers = response.data.customers;
        }
      } catch (err) {
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
<style scoped>
.btn {
  display: block;
  height: 38px;
  width: 100px;
  border-radius: 20px 20px 20px 20px;
  font-size: 16px;
}
</style>