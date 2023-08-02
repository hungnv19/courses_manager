<template>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div
          class="card-header d-flex align-items-center justify-content-between"
        >
          <h5 class="mb-0">Create Question</h5>
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
            >
              <!-- :action="data.urlStore" -->
              <Field type="hidden" :value="csrfToken" name="_token" />
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Question Name <span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Enter Question Name"
                    v-model="model.question"
                    rules="required|max:128"
                    name="question"
                  />
                  <ErrorMessage class="error" name="question" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Explanation <span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <Field
                    as="textarea"
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Enter Explanation"
                    v-model="model.explanation"
                    rules="required|max:128"
                    name="explanation"
                    rows="5"
                  />
                  <ErrorMessage class="error" name="explanation" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Status
                </label>
                <div class="col-sm-10">
                  <Toggle v-model="model.status" name="status" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-1 col-form-label" for="basic-default-name"
                  >A :
                </label>
                <div class="col-sm-1 col-form-label">
                  <input
                    type="checkbox"
                    id="checkbox"
                    name="answers[0][is_checked]"
                    class="form-check-input"
                  />
                  <input
                    type="hidden"
                    value="0"
                    name="answers[0][is_checked]"
                  />
                </div>
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Enter Answer"
                    rules="required|max:128"
                    name="answers[0][answer]"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-1 col-form-label" for="basic-default-name"
                  >B :
                </label>
                <div class="col-sm-1 col-form-label">
                  <input
                    type="checkbox"
                    id="checkbox"
                    name="answers[0][is_checked]"
                    class="form-check-input"
                  />
                  <input
                    type="hidden"
                    value="0"
                    name="answers[0][is_checked]"
                  />
                </div>
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Enter Answer "
                    rules="required|max:128"
                    name="answers[0][answer]"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-1 col-form-label" for="basic-default-name"
                  >C :
                </label>
                <div class="col-sm-1 col-form-label">
                  <input
                    type="checkbox"
                    id="checkbox"
                    name="answers[0][is_checked]"
                    class="form-check-input"
                  />
                  <input
                    type="hidden"
                    value="0"
                    name="answers[0][is_checked]"
                  />
                </div>
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Enter Answer"
                    rules="required|max:128"
                    name="answers[0][answer]"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-1 col-form-label" for="basic-default-name"
                  >D :
                </label>
                <div class="col-sm-1 col-form-label">
                  <input
                    type="checkbox"
                    id="checkbox"
                    name="answers[0][is_checked]"
                    class="form-check-input"
                  />
                  <input
                    type="hidden"
                    value="0"
                    name="answers[0][is_checked]"
                  />
                </div>
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Enter Answer"
                    rules="required|max:128"
                    name="answers[0][answer]"
                  />
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Create</button>
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
import Toggle from "@vueform/toggle";

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
    Toggle,
  },
  computed: {},
  props: ["data"],
  data: function () {
    return {
      csrfToken: Laravel.csrfToken,

      model: {
        name: "",
        department_id: "",
        status: false,
      },
      departments: [],
    };
  },
  created() {
    let messError = {
      en: {
        fields: {
          question: {
            required: "The question name field is required.",
            max: "The question name may not be greater than 128.",
          },
          explanation: {
            required: "The explanation field is required.",
            max: "The explanation may not be greater than 128.",
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

<style src="@vueform/toggle/themes/default.css"></style>
