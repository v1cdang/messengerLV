<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-contact-mail</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Messages</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      color="indigo"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title>Messenger</v-toolbar-title>
    </v-app-bar>

    <v-content>
      <v-container
        fluid
      >
      <v-form
        ref="form"
      >
        <v-row>
          <v-col cols="12" sm="6">
            <v-select
              label="Company"
              v-model="companies"
              :items="companies"
              item-text='company_name'
              item-value='id'
              v-on:change="getDepartmentByCompany()"
              outlined
            ></v-select>
          </v-col>
          <v-col cols="12" sm="6">
            <v-select
              label="Department"
              v-model="department"
              :items="department"
              item-text='department_name'
              item-value='id'
              v-on:change="getEmployeesByCompandDept()"
              outlined
            ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" sm="12">
            <v-select 
              label="Employees"
              v-model="employees"
              :items="employees"
              item-text='name'
              outlined
              ></v-select>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12" sm="12">
            <v-textarea
              outlined
              name="message"
              label="Enter your message"
            ></v-textarea>
          </v-col>
        </v-row>
        <v-row ali>
          <v-col cols="12" sm="12" >
            <v-btn class="mr-4" @click="submit">submit</v-btn>
            <v-btn @click="clear">clear</v-btn>
          </v-col>
        </v-row>
      </v-form>
      </v-container>
    </v-content>
    <v-footer
      color="indigo"
      app
    >
      <span class="white--text">&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
import axios from "axios";

  export default {
    props: {
      source: String,
    },
    data () {
      return {
        drawer: false,
        loading: false,
        companies: [],
        department: [],
        employees: [],
        searchInput: ""
      }
    },
    mounted () {
      this.loading = true;
      
      
    },
    methods: {
      getAllCompany: function() {
        axios
        .get('http://127.0.0.1:8000/api/companies')
        .then(response => (this.companies = response.data.data))
        .catch(error => console.log(error))
        .finally(() => this.loading = false);
      },
      getDepartmentByCompany: function() {
        let self = this;
        axios
          .get('http://127.0.0.1:8000/companies/getDepartmentByCompany/' + self.companies)
          .then(response => (this.department = response.data))
          .catch(error => console.log(error))
          .finally(() => this.loading = false);
      },
      getEmployeesByCompandDept: function() {
        let self = this;
        axios
          .get('http://127.0.0.1:8000/employees/getAllWithCompandDept/' + self.companies + '/' + self.department)
          .then(response => (this.employees = response.data))
          .catch(error => console.log(error))
          .finally(() => this.loading = false);
      }
    },
    created: function(){
      this.getAllCompany();
    }
    
  }
</script>
