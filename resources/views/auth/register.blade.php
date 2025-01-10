<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Register</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="cold-md-12">
                <div class="header-text text-center">
                    <h2>Welcome to ConnectFriend</h2>
                    <p>Sign Up to Connect with Work Buddies.</p>
                </div>
            </div>
            <form action="{{ route('register.store') }}" class="row" method="POST" id="form_register">
                @csrf
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="password_confirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirm') is-invalid @enderror"
                        id="password_confirm" name="password_confirm">
                    <div class="invalid-feedback" id="invalid-feedback">Password does not match</div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Gender</label>
                    
                    <!-- Radio Buttons for Gender -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="Male" required>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="Female" required>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>

                    @error('gender')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="col-md-12 mb-3">
                    <label class="form-label">Field of work (min 3)</label>
                    
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Data Scientist" id="data-scientist" name="field_of_work[]">
                                <label class="form-check-label" for="data-scientist">Data Scientist</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Machine Learning Engineer" id="ml-engineer" name="field_of_work[]">
                                <label class="form-check-label" for="ml-engineer">Machine Learning Engineer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="AI Researcher" id="ai-researcher" name="field_of_work[]">
                                <label class="form-check-label" for="ai-researcher">AI Researcher</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Frontend Developer" id="frontend-developer" name="field_of_work[]">
                                <label class="form-check-label" for="frontend-developer">Frontend Developer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="UI/UX Designer" id="uiux-designer" name="field_of_work[]">
                                <label class="form-check-label" for="uiux-designer">UI/UX Designer</label>
                            </div>
                        </div>
                        
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Web Developer" id="web-developer" name="field_of_work[]">
                                <label class="form-check-label" for="web-developer">Web Developer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Project Manager" id="project-manager" name="field_of_work[]">
                                <label class="form-check-label" for="project-manager">Project Manager</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Scrum Master" id="scrum-master" name="field_of_work[]">
                                <label class="form-check-label" for="scrum-master">Scrum Master</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Business Analyst" id="business-analyst" name="field_of_work[]">
                                <label class="form-check-label" for="business-analyst">Business Analyst</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="IT Support" id="it-support" name="field_of_work[]">
                                <label class="form-check-label" for="it-support">IT Support</label>
                            </div>
                        </div>
                    </div>
                
                    <div id="field-of-work-error" style="color: red; display: none;">Please select at least 3 options.</div>
                
                    @error('field_of_work')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                
                    <script>
                        const checkboxes = document.querySelectorAll("input[name='field_of_work[]']");
                        const errorDiv = document.getElementById("field-of-work-error");
                
                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener("change", () => {
                                const selectedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
                
                                if (selectedCount < 3) {
                                    errorDiv.style.display = "block";
                                } else {
                                    errorDiv.style.display = "none";
                                }
                            });
                        });
                    </script>
                </div> --}}

                <div class="col-md-12 mb-3">
                    <label for="fields" class="form-label">Field Of Works (Min. 3)</label>
                    <select class="form-select @error('fields') is-invalid @enderror"
                        id="multi-select" name="fields[]" multiple="multiple"> 
                        @foreach ($fields as $field)
                            <option value="{{ $field->id }}"
                                {{ collect(old('fields'))->contains($field->id) ? 'selected' : '' }}>
                                {{ $field->name }}</option>
                        @endforeach
                    </select>
                    @error('fields')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-12 mb-3">
                    <label for="linkedin" class="form-label">LinkedIn Username:</label>
                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/username">
                    @error('linkedin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="mobile_number" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" name="mobile_number">
                    @error('mobile_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <button type="submit" class="btn btn-primary" id="btn_register">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    $('#btn_register').prop('disabled', true);
    $('#password_confirm').on('input', function() {
        if ($(this).val() !== $('#password').val()) {
            $('#invalid-feedback').show();
            $('#password_confirm').addClass('is-invalid');
            $('#btn_register').prop('disabled', true);
        } else {
            $('#invalid-feedback').hide();
            $('#password_confirm').removeClass('is-invalid');
            $('#btn_register').prop('disabled', false);
        }
    });
</script>

</html>
