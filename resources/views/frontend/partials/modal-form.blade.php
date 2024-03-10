<!-- Schedule Visit Modal -->
<div class="modal fade" id="scheduleVisitModal" tabindex="-1" aria-labelledby="scheduleVisitModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleVisitModalLabel">Schedule Your Visit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Multi-step Form Start -->
                <form id="propertyInquiryForm">
                    <!-- CSRF Token -->
                    @csrf
                    <!-- Form Step 1: Personal Information -->
                    <div id="formStep1" class="form-step active-step">
                        <h4>Step 1: Personal Information</h4>
                        <div class="form-group">
                            <label for="visitorName">Name</label>
                            <input type="text" class="form-control" id="visitorName">
                            <small class="form-text text-muted validation-message" data-for="visitorName"></small>
                        </div>
                        <div class="form-group">
                            <label for="visitorContact">Contact Info (Mobile No.)</label>
                            <input type="tel" class="form-control" id="visitorContact">
                            <small class="form-text text-muted validation-message" data-for="visitorContact"></small>
                        </div>
                        <div class="form-group">
                            <label for="visitorEmail">Email Address</label>
                            <input type="email" class="form-control" id="visitorEmail">
                            <small class="form-text text-muted validation-message" data-for="visitorEmail"></small>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale"
                                        value="Male">
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale"
                                        value="Female">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="genderOther"
                                        value="Other">
                                    <label class="form-check-label" for="genderOther">Other</label>
                                </div>
                            </div>
                            <small class="form-text text-muted validation-message" data-for="gender"></small>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="detailsConfirmation">
                            <label class="form-check-label" for="detailsConfirmation">All of the details entered are
                                correct.</label>
                            <small class="form-text text-muted validation-message"
                                data-for="detailsConfirmation"></small>
                        </div>
                        <button type="button" class="btn btn-primary toStep2">Next</button>
                    </div>

                    <!-- Form Step 2: Property Selection -->
                    <div id="formStep2" class="form-step">
                        <h4>Step 2: Select Property</h4>
                        <div class="form-group">
                            <label for="propertySelect">Property</label>
                            <select class="form-control" id="propertyId" name="property_id">
                                <option value="none" selected disabled hidden>Select your desired property</option>
                                @foreach ($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->property_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="visitDate">Choose Your Date of Visit</label>
                            <input type="date" class="form-control" id="visitDate">
                            <small class="form-text text-muted validation-message" data-for="visitDate"></small>
                        </div>
                        <button type="button" class="btn btn-secondary backToStep1">Back</button>
                        <button type="button" class="btn btn-primary toStep3">Next</button>
                    </div>

                    <!-- Form Step 3: Additional Message -->
                    <div id="formStep3" class="form-step">
                        <h4>Step 3: Additional Message</h4>
                        <div class="form-group">
                            <label for="additionalMessage">Your Message (Optional)</label>
                            <textarea class="form-control" id="additionalMessage"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary backToStep2">Back</button>
                        <button type="button" class="btn btn-success submitVisitRequest">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
