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
        <v-row align="left">
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
              outlined
            ></v-select>
          </v-col>
        </v-row>
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
        companies: null,
        department: null
      }
    },
    mounted () {
      this.loading = true;
      axios
        .get('http://127.0.0.1:8000/api/companies')
        .then(response => (this.companies = response.data.data))
        .catch(error => console.log(error))
        .finally(() => this.loading = false);
      
    },
    getDepartmentByCompany() {

      axios
        .get('http://127.0.0.1:8000/companies/getDepartmentByCompany/' + this.companies.id)
        .then(response => (this.department = response.data.data))
        .catch(error => console.log(error))
        .finally(() => this.loading = false);
    }
  }
</script>
