<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <!-- <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img
              src=""
              alt="user-avatar"
              class="d-block rounded"
              height="100"
              width="100"
              id="uploadedAvatar"
            />
            <div class="button-wrapper">
              <label
                for="upload"
                class="btn btn-primary me-2 mb-4"
                tabindex="0"
              >
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input
                  type="file"
                  id="upload"
                  class="account-file-input"
                  hidden
                  accept="image/png, image/jpeg"
                />
              </label>
              <button
                type="button"
                class="btn btn-outline-secondary account-image-reset mb-4"
              >
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>

              <p class="text-muted mb-0">
                Allowed JPG, GIF or PNG. Max size of 800K
              </p>
            </div>
          </div>
        </div> -->
        <hr class="my-0" />
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
              <Field type="hidden" :value="csrfToken" name="_token" />
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <Field
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="first_name"
                    placeholder="Enter Your First Name"
                    v-model="model.first_name"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="first_name" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="last_name" class="form-label">Last Name</label>
                  <Field
                    class="form-control"
                    type="text"
                    name="last_name"
                    id="last_name"
                    placeholder="Enter Your Last Name"
                    v-model="model.last_name"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="first_name" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <Field
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="Enter Your Email Address"
                    placeholder="Enter Your Email Address"
                    v-model="model.email"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="email" />
                </div>

                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phone">Phone Number</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">VN (+84)</span>
                    <Field
                      type="text"
                      id="phone"
                      name="phone"
                      class="form-control"
                      placeholder="Enter Your Phone Number"
                      v-model="model.phone"
                      rules="required|max:128"
                    />
                    <ErrorMessage class="error" name="phone" />
                  </div>
                </div>
                <div class="mb-3 col-md-4">
                  <label for="address" class="form-label">Address</label>
                  <Field
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    placeholder="Enter Your Address"
                    v-model="model.address"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="address" />
                </div>
                <div class="mb-3 col-md-4">
                  <label for="date_birth" class="form-label">Date Birth</label>
                  <Field
                    class="form-control"
                    type="date"
                    id="date_birth"
                    name="date_birth"
                    v-model="model.date_birth"
                  />
                </div>
                <div class="mb-3 col-md-4">
                  <label for="position" class="form-label">Position</label>
                  <Field
                    class="form-control"
                    type="text"
                    id="position"
                    name="position"
                    placeholder="Enter Your Position"
                    v-model="model.position"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="position" />
                </div>
                <div class="mb-3 col-md-10">
                  <label for="description" class="form-label"
                    >Description</label
                  >
                  <Field
                    class="form-control"
                    type="text"
                    id="description"
                    name="description"
                    placeholder="Enter Your Description"
                    v-model="model.description"
                    rules="required|max:128"
                    cols="30"
                    rows="4"
                    as="textarea"
                  />
                  <ErrorMessage class="error" name="description" />
                </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">
                  Save changes
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                  Cancel
                </button>
              </div>
            </form>
          </VeeForm>
        </div>
        <!-- /Account -->
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

      model: this.data.user,
    };
  },
  created() {
    let messError = {
      en: {
        fields: {
          first_name: {
            required: "The first_name field is required.",
            max: "The first_name may not be greater than 128.",
          },
          last_name: {
            required: "The last_name field is required.",
            max: "The last_name may not be greater than 128.",
          },
          first_name: {
            required: "The first_name field is required.",
            max: "The first_name may not be greater than 128.",
          },
          email: {
            required: "The EMAIL field is required.",
            max: "The EMAIL may not be greater than 128.",
          },
          description: {
            required: "The description field is required.",
            max: "The description may not be greater than 255.",
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

