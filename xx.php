{{ form_start(form) }}
<div class="row">
    <h3 class="text-extrabold">Your personal informations</h3>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="input-field">
            {{ form_row(form.gender) }}
        </div>
    </div>
    <div class="clearfix visible-sm"></div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="input-field">
            {{ form_row(form.firstName) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="input-field">
            {{ form_row(form.lastName) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="input-field">
            {{ form_row(form.currentLocation) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-8">
        <div class="input-field">
            {{ form_row(form.adress) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="file-field input-field" style="margin-top: 32px;">
            <div class="btn btn-lg primary waves-effect waves-light">
                <span>
                    <i class="material-icons">insert_photo</i>
                    Photo</span>
                <input id="photo" size="20000000" accept=".pdf,.jpg,.doc,.docx,.png,.gif" name="photo" type="file">
            </div>

            <div class="existing-file">
                <a href="#!" target="_blank">
                    <i class="material-icons">&#xE24D;</i>
                    profil_picture.jpg</a>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your ID photo" readonly>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="input-field">
                    {{ form_row(form.country) }}

                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="input-field">
                    {{ form_row(form.nationality) }}

                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="input-field">
                    {{ form_row(form.dateOfBirth) }}

                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="input-field">
                    <input id="birth_place" name="birth_place" type="text" value="">
                    <label for="birth_place">Birthplace</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-40">
    <h3 class="text-extrabold">Your professional profile</h3>
    <div class="col-xs-12 col-sm-6">

        <div class="card card-panel passport">
            <div class="file-field input-field">
                <div class="btn btn-lg primary waves-effect waves-light">
                    <span>
                        <i class="material-icons">&#xE24D;</i>
                        Passport</span>
                    <input id="passport" size="20000000" accept=".pdf,.jpg,.doc,.docx,.png,.gif" name="passport" type="file">
                </div>
                <div class="existing-file">
                    <a href="#!" target="_blank">
                        <i class="material-icons">&#xE24D;</i>
                        passeport.jpg</a>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your passport" readonly>
                </div>
            </div>

            <div class="file-field input-field">
                <div class="btn btn-lg primary waves-effect waves-light">
                    <span>
                        <i class="material-icons">&#xE24D;</i>
                        CV</span>
                    <input id="cv" size="20000000" accept=".pdf,.jpg,.doc,.docx,.png,.gif" name="cv" type="file">
                </div>

                <div class="existing-file">
                    <a href="#!" target="_blank">
                        <i class="material-icons">&#xE24D;</i>
                        CV.pdf</a>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your Curriculum Vitae" readonly>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="col-xs-12 col-sm-12">
            <div class="input-field" style="margin-top: 5px;">
                <select id="job_sector" name="job_sector[]" multiple data-placeholder="Type in or Select job sector you would be interested in.">
                    <option value="">Choose an option...</option>
                    <option value="">job sector</option>
                </select>
                <label for="job_sector" class="active">Interest in job sector</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="input-field">
                <select id="experience" required="required" name="experience">
                    <option value="">Choose</option>
                    <option value="3m">0 - 6 month</option>
                    <option value="6m">6 month - 1 year</option>
                    <option value="1y">1 - 2 years</option>
                    <option value="2y">2+ years</option>
                    <option value="5y" selected="selected">5+ years</option>
                    <option value="10y">10+ years</option>
                </select>
                <label for="experience" class="active">Experience</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12">
        <div class="input-field">
            <textarea class="materialize-textarea" id="description" name="description" cols="50" rows="10"></textarea>
            <label for="description">Short description for your profile, as well as more personnal informations (e.g. your hobbies/interests ). You can also paste any link you want.</label>
        </div>
    </div>
</div>

<button class="btn">{{ button_label|default('Save') }}</button>
{{ form_end(form) }}</div>