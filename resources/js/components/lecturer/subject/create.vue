<template>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div
          class="card-header d-flex align-items-center justify-content-between"
        >
          <h5 class="mb-0">Create Subject</h5>
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
              :action="data.urlStore"
            >
              <Field type="hidden" :value="csrfToken" name="_token" />
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Title <span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Title"
                    v-model="model.title"
                    rules="required|max:128"
                    name="title"
                  />
                  <ErrorMessage class="error" name="title" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Class"
                  >Class<span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <select
                    id="Class"
                    class="form-control"
                    rules="required"
                    name="class_id"
                    v-model="model.class_id"
                  >
                    <option value disabled selected>--- Chose Class ---</option>
                    <option
                      v-for="item in data.classes"
                      :key="item.id"
                      :value="item.id"
                    >
                      {{ item.label }}
                    </option>
                  </select>
                  <ErrorMessage class="error" name="class_id" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Start Date <span class="required-label"> *</span></label
                >
                <div class="col-sm-4">
                  <datepicker
                    autoApply
                    keepActionRow
                    v-model="model.start_date"
                    :closeOnAutoApply="false"
                    :enableSeconds="true"
                    :monthChangeOnScroll="false"
                    class="col-sm-6"
                    name="start_date"
                    :maxDate="model.end_date ? new Date(model.end_date) : null"
                    :maxTime="setMaxTime()"
                    timerPicker="false"
                    format="yyyy/MM/dd HH:mm:ss"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >End Date <span class="required-label"> *</span></label
                >
                <div class="col-sm-4">
                  <datepicker
                    autoApply
                    keepActionRow
                    v-model="model.end_date"
                    :closeOnAutoApply="false"
                    :monthChangeOnScroll="false"
                    class="col-sm-6"
                    name="end_date"
                    :minTime="setMinTime()"
                    :minDate="
                      model.start_date ? new Date(model.start_date) : null
                    "
                    timerPicker="false"
                    format="yyyy/MM/dd HH:mm:ss"
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
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
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
    Datepicker,
  },
  computed: {},
  props: ["data"],
  data: function () {
    return {
      csrfToken: Laravel.csrfToken,

      model: {
        title: "",
        class: "",
        class_id: "",
      },
      classes: [],
    };
  },
  created() {
    let messError = {
      en: {
        fields: {
          title: {
            required: "The title field is required.",
            max: "The name title not be greater than 128.",
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
    setMaxTime() {
      if (this.model.end_date && this.model.start_date) {
        let dateStart = new Date(this.model.start_date);
        let dateEnd = new Date(this.model.end_date);
        if (
          dateStart.getFullYear() == dateEnd.getFullYear() &&
          dateStart.getMonth() == dateEnd.getMonth() &&
          dateStart.getDate() == dateEnd.getDate()
        ) {
          return {
            hours: dateEnd.getHours(),
            minutes: dateEnd.getMinutes(),
            seconds: dateStart.getSeconds(),
          };
        }
      }
      return null;
    },
    setMinTime() {
      if (this.model.end_date && this.model.start_date) {
        let dateStart = new Date(this.model.start_date);
        let dateEnd = new Date(this.model.end_date);
        if (
          dateStart.getFullYear() == dateEnd.getFullYear() &&
          dateStart.getMonth() == dateEnd.getMonth() &&
          dateStart.getDate() == dateEnd.getDate()
        ) {
          return {
            hours: dateStart.getHours(),
            minutes: dateStart.getMinutes(),
            seconds: dateStart.getSeconds(),
          };
        }
      }
      return null;
    },
  },
};
</script>

