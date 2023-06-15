<template>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div
          class="card-header d-flex align-items-center justify-content-between"
        >
          <h5 class="mb-0">Edit Category</h5>
        </div>
        <div class="card-body">
          <VeeForm
            as="div"
            v-slot="{ handleSubmit }"
            class="form-owner"
            @invalid-submit="onInvalidSubmit"
          >
            <form
              method="POST"
              @submit="handleSubmit($event, onSubmit)"
              ref="formData"
              enctype="multipart/form-data"
              :action="data.urlUpdate"
            >
              <Field type="hidden" value="PUT" name="_method" />
              <Field type="hidden" :value="csrfToken" name="_token" />
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Name <span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Name"
                    v-model="model.name"
                    rules="required|max:128"
                    name="name"
                  />
                  <ErrorMessage class="error" name="name" />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a
                    :href="data.urlBack"
                    class="btn btn-outline-secondary"
                    style="margin-left: 10px"
                  >
                    Back
                  </a>
                </div>
              </div>
            </form>
          </VeeForm>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {
  Form as VeeForm,
  Field,
  ErrorMessage,
  defineRule,
  configure,
} from "vee-validate";
import { localize } from "@vee-validate/i18n";
import * as rules from "@vee-validate/rules";
import $ from "jquery";

export default {
  setup() {
    Object.keys(rules).forEach((rule) => {
      if (rule != "default") {
        defineRule(rule, rules[rule]);
      }
    });
  },
  components: {
    VeeForm,
    Field,
    ErrorMessage,
  },
  computed: {},
  props: ["data"],
  data: function () {
    return {
      csrfToken: Laravel.csrfToken,

      model: this.data.category,
    };
  },
  created() {
    let messError = {
      en: {
        fields: {
          name: {
            required: "The name field is required.",
            max: "The name may not be greater than 128.",
          },
        },
      },
    };
    configure({
      generateMessage: localize(messError),
    });
  },
  methods: {
    onInvalidSubmit({ values, errors, results }) {
      let firstInputError = Object.entries(errors)[0][0];
      this.$el.querySelector("input[name=" + firstInputError + "]").focus();
      $("html, body").animate(
        {
          scrollTop:
            $("input[name=" + firstInputError + "]").offset().top - 150,
        },
        500
      );
    },
    onSubmit() {
      this.$refs.formData.submit();
    },
  },
};
</script>

