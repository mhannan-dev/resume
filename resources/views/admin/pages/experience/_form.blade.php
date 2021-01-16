@csrf
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="category_id">Company name</label>
        <input type="text" name="company_name" class="form-control" placeholder="Company name">
    </div>

    <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input type="text" name="designation" class="form-control" placeholder="Designation">
    </div>
    <div class="form-group col-md-">
        <label>Date:</label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
    </div>


</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
