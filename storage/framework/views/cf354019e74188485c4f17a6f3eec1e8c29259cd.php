<div class="single-input mt-4">
    <label class="label-title mb-3"><?php echo e($label); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.mandatory-indicator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.mandatory-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></label>
    <select name="<?php echo e($name); ?>" class="form-control form--control <?php echo e($class ?? ''); ?>">
        <option <?php if(isset($value) && $value === "Afganistan"): ?> selected <?php endif; ?> value="Afganistan">Afghanistan</option>
        <option <?php if(isset($value) && $value === "Albania"): ?> selected <?php endif; ?> value="Albania">Albania</option>
        <option <?php if(isset($value) && $value === "Algeria"): ?> selected <?php endif; ?> value="Algeria">Algeria</option>
        <option <?php if(isset($value) && $value === "American Samoa"): ?> selected <?php endif; ?> value="American Samoa">American Samoa</option>
        <option <?php if(isset($value) && $value === "Andorra"): ?> selected <?php endif; ?> value="Andorra">Andorra</option>
        <option <?php if(isset($value) && $value === "Angola"): ?> selected <?php endif; ?> value="Angola">Angola</option>
        <option <?php if(isset($value) && $value === "Anguilla"): ?> selected <?php endif; ?> value="Anguilla">Anguilla</option>
        <option <?php if(isset($value) && $value === "Antigua &amp; Barbuda"): ?> selected <?php endif; ?> value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
        <option <?php if(isset($value) && $value === "Argentina"): ?> selected <?php endif; ?> value="Argentina">Argentina</option>
        <option <?php if(isset($value) && $value === "Armenia"): ?> selected <?php endif; ?> value="Armenia">Armenia</option>
        <option <?php if(isset($value) && $value === "Aruba"): ?> selected <?php endif; ?> value="Aruba">Aruba</option>
        <option <?php if(isset($value) && $value === "Australia"): ?> selected <?php endif; ?> value="Australia">Australia</option>
        <option <?php if(isset($value) && $value === "Austria"): ?> selected <?php endif; ?> value="Austria">Austria</option>
        <option <?php if((isset($value) && $value === "Azerbaijan") || !isset($value)): ?> selected <?php endif; ?> value="Azerbaijan">Azerbaijan</option>
        <option <?php if(isset($value) && $value === "Bahamas"): ?> selected <?php endif; ?> value="Bahamas">Bahamas</option>
        <option <?php if(isset($value) && $value === "Bahrain"): ?> selected <?php endif; ?> value="Bahrain">Bahrain</option>
        <option <?php if(isset($value) && $value === "Bangladesh"): ?> selected <?php endif; ?> value="Bangladesh">Bangladesh</option>
        <option <?php if(isset($value) && $value === "Barbados"): ?> selected <?php endif; ?> value="Barbados">Barbados</option>
        <option <?php if(isset($value) && $value === "Belarus"): ?> selected <?php endif; ?> value="Belarus">Belarus</option>
        <option <?php if(isset($value) && $value === "Belgium"): ?> selected <?php endif; ?> value="Belgium">Belgium</option>
        <option <?php if(isset($value) && $value === "Belize"): ?> selected <?php endif; ?> value="Belize">Belize</option>
        <option <?php if(isset($value) && $value === "Benin"): ?> selected <?php endif; ?> value="Benin">Benin</option>
        <option <?php if(isset($value) && $value === "Bermuda"): ?> selected <?php endif; ?> value="Bermuda">Bermuda</option>
        <option <?php if(isset($value) && $value === "Bhutan"): ?> selected <?php endif; ?> value="Bhutan">Bhutan</option>
        <option <?php if(isset($value) && $value === "Bolivia"): ?> selected <?php endif; ?> value="Bolivia">Bolivia</option>
        <option <?php if(isset($value) && $value === "Bonaire"): ?> selected <?php endif; ?> value="Bonaire">Bonaire</option>
        <option <?php if(isset($value) && $value === "Bosnia"): ?> selected <?php endif; ?> value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
        <option <?php if(isset($value) && $value === "Botswana"): ?> selected <?php endif; ?> value="Botswana">Botswana</option>
        <option <?php if(isset($value) && $value === "Brazil"): ?> selected <?php endif; ?> value="Brazil">Brazil</option>
        <option <?php if(isset($value) && $value === "British Indian Ocean Ter"): ?> selected <?php endif; ?> value="British Indian Ocean Ter">British Indian Ocean Ter</option>
        <option <?php if(isset($value) && $value === "Brunei"): ?> selected <?php endif; ?> value="Brunei">Brunei</option>
        <option <?php if(isset($value) && $value === "Bulgaria"): ?> selected <?php endif; ?> value="Bulgaria">Bulgaria</option>
        <option <?php if(isset($value) && $value === "Burkina Faso"): ?> selected <?php endif; ?> value="Burkina Faso">Burkina Faso</option>
        <option <?php if(isset($value) && $value === "Burundi"): ?> selected <?php endif; ?> value="Burundi">Burundi</option>
        <option <?php if(isset($value) && $value === "Cambodia"): ?> selected <?php endif; ?> value="Cambodia">Cambodia</option>
        <option <?php if(isset($value) && $value === "Cameroon"): ?> selected <?php endif; ?> value="Cameroon">Cameroon</option>
        <option <?php if(isset($value) && $value === "Canada"): ?> selected <?php endif; ?> value="Canada">Canada</option>
        <option <?php if(isset($value) && $value === "Canary Islands"): ?> selected <?php endif; ?> value="Canary Islands">Canary Islands</option>
        <option <?php if(isset($value) && $value === "Cape Verde"): ?> selected <?php endif; ?> value="Cape Verde">Cape Verde</option>
        <option <?php if(isset($value) && $value === "Cayman Islands"): ?> selected <?php endif; ?> value="Cayman Islands">Cayman Islands</option>
        <option <?php if(isset($value) && $value === "Central African Republic"): ?> selected <?php endif; ?> value="Central African Republic">Central African Republic</option>
        <option <?php if(isset($value) && $value === "Chad"): ?> selected <?php endif; ?> value="Chad">Chad</option>
        <option <?php if(isset($value) && $value === "Channel Islands"): ?> selected <?php endif; ?> value="Channel Islands">Channel Islands</option>
        <option <?php if(isset($value) && $value === "Chile"): ?> selected <?php endif; ?> value="Chile">Chile</option>
        <option <?php if(isset($value) && $value === "China"): ?> selected <?php endif; ?> value="China">China</option>
        <option <?php if(isset($value) && $value === "Christmas Island"): ?> selected <?php endif; ?> value="Christmas Island">Christmas Island</option>
        <option <?php if(isset($value) && $value === "Cocos Island"): ?> selected <?php endif; ?> value="Cocos Island">Cocos Island</option>
        <option <?php if(isset($value) && $value === "Colombia"): ?> selected <?php endif; ?> value="Colombia">Colombia</option>
        <option <?php if(isset($value) && $value === "Comoros"): ?> selected <?php endif; ?> value="Comoros">Comoros</option>
        <option <?php if(isset($value) && $value === "Congo"): ?> selected <?php endif; ?> value="Congo">Congo</option>
        <option <?php if(isset($value) && $value === "Cook Islands"): ?> selected <?php endif; ?> value="Cook Islands">Cook Islands</option>
        <option <?php if(isset($value) && $value === "Costa Rica"): ?> selected <?php endif; ?> value="Costa Rica">Costa Rica</option>
        <option <?php if(isset($value) && $value === "Cote DIvoire"): ?> selected <?php endif; ?> value="Cote DIvoire">Cote DIvoire</option>
        <option <?php if(isset($value) && $value === "Croatia"): ?> selected <?php endif; ?> value="Croatia">Croatia</option>
        <option <?php if(isset($value) && $value === "Cuba"): ?> selected <?php endif; ?> value="Cuba">Cuba</option>
        <option <?php if(isset($value) && $value === "Curaco"): ?> selected <?php endif; ?> value="Curaco">Curacao</option>
        <option <?php if(isset($value) && $value === "Cyprus"): ?> selected <?php endif; ?> value="Cyprus">Cyprus</option>
        <option <?php if(isset($value) && $value === "Czech Republic"): ?> selected <?php endif; ?> value="Czech Republic">Czech Republic</option>
        <option <?php if(isset($value) && $value === "Denmark"): ?> selected <?php endif; ?> value="Denmark">Denmark</option>
        <option <?php if(isset($value) && $value === "Djibouti"): ?> selected <?php endif; ?> value="Djibouti">Djibouti</option>
        <option <?php if(isset($value) && $value === "Dominica"): ?> selected <?php endif; ?> value="Dominica">Dominica</option>
        <option <?php if(isset($value) && $value === "Dominican Republic"): ?> selected <?php endif; ?> value="Dominican Republic">Dominican Republic</option>
        <option <?php if(isset($value) && $value === "East Timor"): ?> selected <?php endif; ?> value="East Timor">East Timor</option>
        <option <?php if(isset($value) && $value === "Ecuador"): ?> selected <?php endif; ?> value="Ecuador">Ecuador</option>
        <option <?php if(isset($value) && $value === "Egypt"): ?> selected <?php endif; ?> value="Egypt">Egypt</option>
        <option <?php if(isset($value) && $value === "El Salvador"): ?> selected <?php endif; ?> value="El Salvador">El Salvador</option>
        <option <?php if(isset($value) && $value === "Equatorial Guinea"): ?> selected <?php endif; ?> value="Equatorial Guinea">Equatorial Guinea</option>
        <option <?php if(isset($value) && $value === "Eritrea"): ?> selected <?php endif; ?> value="Eritrea">Eritrea</option>
        <option <?php if(isset($value) && $value === "Estonia"): ?> selected <?php endif; ?> value="Estonia">Estonia</option>
        <option <?php if(isset($value) && $value === "Ethiopia"): ?> selected <?php endif; ?> value="Ethiopia">Ethiopia</option>
        <option <?php if(isset($value) && $value === "Falkland Islands"): ?> selected <?php endif; ?> value="Falkland Islands">Falkland Islands</option>
        <option <?php if(isset($value) && $value === "Faroe Islands"): ?> selected <?php endif; ?> value="Faroe Islands">Faroe Islands</option>
        <option <?php if(isset($value) && $value === "Fiji"): ?> selected <?php endif; ?> value="Fiji">Fiji</option>
        <option <?php if(isset($value) && $value === "Finland"): ?> selected <?php endif; ?> value="Finland">Finland</option>
        <option <?php if(isset($value) && $value === "France"): ?> selected <?php endif; ?> value="France">France</option>
        <option <?php if(isset($value) && $value === "French Guiana"): ?> selected <?php endif; ?> value="French Guiana">French Guiana</option>
        <option <?php if(isset($value) && $value === "French Polynesia"): ?> selected <?php endif; ?> value="French Polynesia">French Polynesia</option>
        <option <?php if(isset($value) && $value === "French Southern Ter"): ?> selected <?php endif; ?> value="French Southern Ter">French Southern Ter</option>
        <option <?php if(isset($value) && $value === "Gabon"): ?> selected <?php endif; ?> value="Gabon">Gabon</option>
        <option <?php if(isset($value) && $value === "Gambia"): ?> selected <?php endif; ?> value="Gambia">Gambia</option>
        <option <?php if(isset($value) && $value === "Georgia"): ?> selected <?php endif; ?> value="Georgia">Georgia</option>
        <option <?php if(isset($value) && $value === "Germany"): ?> selected <?php endif; ?> value="Germany">Germany</option>
        <option <?php if(isset($value) && $value === "Ghana"): ?> selected <?php endif; ?> value="Ghana">Ghana</option>
        <option <?php if(isset($value) && $value === "Gibraltar"): ?> selected <?php endif; ?> value="Gibraltar">Gibraltar</option>
        <option <?php if(isset($value) && $value === "Great Britain"): ?> selected <?php endif; ?> value="Great Britain">Great Britain</option>
        <option <?php if(isset($value) && $value === "Greece"): ?> selected <?php endif; ?> value="Greece">Greece</option>
        <option <?php if(isset($value) && $value === "Greenland"): ?> selected <?php endif; ?> value="Greenland">Greenland</option>
        <option <?php if(isset($value) && $value === "Grenada"): ?> selected <?php endif; ?> value="Grenada">Grenada</option>
        <option <?php if(isset($value) && $value === "Guadeloupe"): ?> selected <?php endif; ?> value="Guadeloupe">Guadeloupe</option>
        <option <?php if(isset($value) && $value === "Guam"): ?> selected <?php endif; ?> value="Guam">Guam</option>
        <option <?php if(isset($value) && $value === "Guatemala"): ?> selected <?php endif; ?> value="Guatemala">Guatemala</option>
        <option <?php if(isset($value) && $value === "Guinea"): ?> selected <?php endif; ?> value="Guinea">Guinea</option>
        <option <?php if(isset($value) && $value === "Guyana"): ?> selected <?php endif; ?> value="Guyana">Guyana</option>
        <option <?php if(isset($value) && $value === "Haiti"): ?> selected <?php endif; ?> value="Haiti">Haiti</option>
        <option <?php if(isset($value) && $value === "Hawaii"): ?> selected <?php endif; ?> value="Hawaii">Hawaii</option>
        <option <?php if(isset($value) && $value === "Honduras"): ?> selected <?php endif; ?> value="Honduras">Honduras</option>
        <option <?php if(isset($value) && $value === "Hong Kong"): ?> selected <?php endif; ?> value="Hong Kong">Hong Kong</option>
        <option <?php if(isset($value) && $value === "Hungary"): ?> selected <?php endif; ?> value="Hungary">Hungary</option>
        <option <?php if(isset($value) && $value === "Iceland"): ?> selected <?php endif; ?> value="Iceland">Iceland</option>
        <option <?php if(isset($value) && $value === "Indonesia"): ?> selected <?php endif; ?> value="Indonesia">Indonesia</option>
        <option <?php if(isset($value) && $value === "India"): ?> selected <?php endif; ?> value="India">India</option>
        <option <?php if(isset($value) && $value === "Iran"): ?> selected <?php endif; ?> value="Iran">Iran</option>
        <option <?php if(isset($value) && $value === "Iraq"): ?> selected <?php endif; ?> value="Iraq">Iraq</option>
        <option <?php if(isset($value) && $value === "Ireland"): ?> selected <?php endif; ?> value="Ireland">Ireland</option>
        <option <?php if(isset($value) && $value === "Isle of Man"): ?> selected <?php endif; ?> value="Isle of Man">Isle of Man</option>
        <option <?php if(isset($value) && $value === "Israel"): ?> selected <?php endif; ?> value="Israel">Israel</option>
        <option <?php if(isset($value) && $value === "Italy"): ?> selected <?php endif; ?> value="Italy">Italy</option>
        <option <?php if(isset($value) && $value === "Jamaica"): ?> selected <?php endif; ?> value="Jamaica">Jamaica</option>
        <option <?php if(isset($value) && $value === "Japan"): ?> selected <?php endif; ?> value="Japan">Japan</option>
        <option <?php if(isset($value) && $value === "Jordan"): ?> selected <?php endif; ?> value="Jordan">Jordan</option>
        <option <?php if(isset($value) && $value === "Kazakhstan"): ?> selected <?php endif; ?> value="Kazakhstan">Kazakhstan</option>
        <option <?php if(isset($value) && $value === "Kenya"): ?> selected <?php endif; ?> value="Kenya">Kenya</option>
        <option <?php if(isset($value) && $value === "Kiribati"): ?> selected <?php endif; ?> value="Kiribati">Kiribati</option>
        <option <?php if(isset($value) && $value === "Korea North"): ?> selected <?php endif; ?> value="Korea North">Korea North</option>
        <option <?php if(isset($value) && $value === "Korea Sout"): ?> selected <?php endif; ?> value="Korea Sout">Korea South</option>
        <option <?php if(isset($value) && $value === "Kuwait"): ?> selected <?php endif; ?> value="Kuwait">Kuwait</option>
        <option <?php if(isset($value) && $value === "Kyrgyzstan"): ?> selected <?php endif; ?> value="Kyrgyzstan">Kyrgyzstan</option>
        <option <?php if(isset($value) && $value === "Laos"): ?> selected <?php endif; ?> value="Laos">Laos</option>
        <option <?php if(isset($value) && $value === "Latvia"): ?> selected <?php endif; ?> value="Latvia">Latvia</option>
        <option <?php if(isset($value) && $value === "Lebanon"): ?> selected <?php endif; ?> value="Lebanon">Lebanon</option>
        <option <?php if(isset($value) && $value === "Lesotho"): ?> selected <?php endif; ?> value="Lesotho">Lesotho</option>
        <option <?php if(isset($value) && $value === "Liberia"): ?> selected <?php endif; ?> value="Liberia">Liberia</option>
        <option <?php if(isset($value) && $value === "Libya"): ?> selected <?php endif; ?> value="Libya">Libya</option>
        <option <?php if(isset($value) && $value === "Liechtenstein"): ?> selected <?php endif; ?> value="Liechtenstein">Liechtenstein</option>
        <option <?php if(isset($value) && $value === "Lithuania"): ?> selected <?php endif; ?> value="Lithuania">Lithuania</option>
        <option <?php if(isset($value) && $value === "Luxembourg"): ?> selected <?php endif; ?> value="Luxembourg">Luxembourg</option>
        <option <?php if(isset($value) && $value === "Macau"): ?> selected <?php endif; ?> value="Macau">Macau</option>
        <option <?php if(isset($value) && $value === "Macedonia"): ?> selected <?php endif; ?> value="Macedonia">Macedonia</option>
        <option <?php if(isset($value) && $value === "Madagascar"): ?> selected <?php endif; ?> value="Madagascar">Madagascar</option>
        <option <?php if(isset($value) && $value === "Malaysia"): ?> selected <?php endif; ?> value="Malaysia">Malaysia</option>
        <option <?php if(isset($value) && $value === "Malawi"): ?> selected <?php endif; ?> value="Malawi">Malawi</option>
        <option <?php if(isset($value) && $value === "Maldives"): ?> selected <?php endif; ?> value="Maldives">Maldives</option>
        <option <?php if(isset($value) && $value === "Mali"): ?> selected <?php endif; ?> value="Mali">Mali</option>
        <option <?php if(isset($value) && $value === "Malta"): ?> selected <?php endif; ?> value="Malta">Malta</option>
        <option <?php if(isset($value) && $value === "Marshall Islands"): ?> selected <?php endif; ?> value="Marshall Islands">Marshall Islands</option>
        <option <?php if(isset($value) && $value === "Martinique"): ?> selected <?php endif; ?> value="Martinique">Martinique</option>
        <option <?php if(isset($value) && $value === "Mauritania"): ?> selected <?php endif; ?> value="Mauritania">Mauritania</option>
        <option <?php if(isset($value) && $value === "Mauritius"): ?> selected <?php endif; ?> value="Mauritius">Mauritius</option>
        <option <?php if(isset($value) && $value === "Mayotte"): ?> selected <?php endif; ?> value="Mayotte">Mayotte</option>
        <option <?php if(isset($value) && $value === "Mexico"): ?> selected <?php endif; ?> value="Mexico">Mexico</option>
        <option <?php if(isset($value) && $value === "Midway Islands"): ?> selected <?php endif; ?> value="Midway Islands">Midway Islands</option>
        <option <?php if(isset($value) && $value === "Moldova"): ?> selected <?php endif; ?> value="Moldova">Moldova</option>
        <option <?php if(isset($value) && $value === "Monaco"): ?> selected <?php endif; ?> value="Monaco">Monaco</option>
        <option <?php if(isset($value) && $value === "Mongolia"): ?> selected <?php endif; ?> value="Mongolia">Mongolia</option>
        <option <?php if(isset($value) && $value === "Montserrat"): ?> selected <?php endif; ?> value="Montserrat">Montserrat</option>
        <option <?php if(isset($value) && $value === "Morocco"): ?> selected <?php endif; ?> value="Morocco">Morocco</option>
        <option <?php if(isset($value) && $value === "Mozambique"): ?> selected <?php endif; ?> value="Mozambique">Mozambique</option>
        <option <?php if(isset($value) && $value === "Myanmar"): ?> selected <?php endif; ?> value="Myanmar">Myanmar</option>
        <option <?php if(isset($value) && $value === "Nambia"): ?> selected <?php endif; ?> value="Nambia">Nambia</option>
        <option <?php if(isset($value) && $value === "Nauru"): ?> selected <?php endif; ?> value="Nauru">Nauru</option>
        <option <?php if(isset($value) && $value === "Nepal"): ?> selected <?php endif; ?> value="Nepal">Nepal</option>
        <option <?php if(isset($value) && $value === "Netherland Antilles"): ?> selected <?php endif; ?> value="Netherland Antilles">Netherland Antilles</option>
        <option <?php if(isset($value) && $value === "Netherlands"): ?> selected <?php endif; ?> value="Netherlands">Netherlands (Holland, Europe)</option>
        <option <?php if(isset($value) && $value === "Nevis"): ?> selected <?php endif; ?> value="Nevis">Nevis</option>
        <option <?php if(isset($value) && $value === "New Caledonia"): ?> selected <?php endif; ?> value="New Caledonia">New Caledonia</option>
        <option <?php if(isset($value) && $value === "New Zealand"): ?> selected <?php endif; ?> value="New Zealand">New Zealand</option>
        <option <?php if(isset($value) && $value === "Nicaragua"): ?> selected <?php endif; ?> value="Nicaragua">Nicaragua</option>
        <option <?php if(isset($value) && $value === "Niger"): ?> selected <?php endif; ?> value="Niger">Niger</option>
        <option <?php if(isset($value) && $value === "Nigeria"): ?> selected <?php endif; ?> value="Nigeria">Nigeria</option>
        <option <?php if(isset($value) && $value === "Niue"): ?> selected <?php endif; ?> value="Niue">Niue</option>
        <option <?php if(isset($value) && $value === "Norfolk Island"): ?> selected <?php endif; ?> value="Norfolk Island">Norfolk Island</option>
        <option <?php if(isset($value) && $value === "Norway"): ?> selected <?php endif; ?> value="Norway">Norway</option>
        <option <?php if(isset($value) && $value === "Oman"): ?> selected <?php endif; ?> value="Oman">Oman</option>
        <option <?php if(isset($value) && $value === "Pakistan"): ?> selected <?php endif; ?> value="Pakistan">Pakistan</option>
        <option <?php if(isset($value) && $value === "Palau Island"): ?> selected <?php endif; ?> value="Palau Island">Palau Island</option>
        <option <?php if(isset($value) && $value === "Palestine"): ?> selected <?php endif; ?> value="Palestine">Palestine</option>
        <option <?php if(isset($value) && $value === "Panama"): ?> selected <?php endif; ?> value="Panama">Panama</option>
        <option <?php if(isset($value) && $value === "Papua New Guinea"): ?> selected <?php endif; ?> value="Papua New Guinea">Papua New Guinea</option>
        <option <?php if(isset($value) && $value === "Paraguay"): ?> selected <?php endif; ?> value="Paraguay">Paraguay</option>
        <option <?php if(isset($value) && $value === "Peru"): ?> selected <?php endif; ?> value="Peru">Peru</option>
        <option <?php if(isset($value) && $value === "Phillipines"): ?> selected <?php endif; ?> value="Phillipines">Philippines</option>
        <option <?php if(isset($value) && $value === "Pitcairn Island"): ?> selected <?php endif; ?> value="Pitcairn Island">Pitcairn Island</option>
        <option <?php if(isset($value) && $value === "Poland"): ?> selected <?php endif; ?> value="Poland">Poland</option>
        <option <?php if(isset($value) && $value === "Portugal"): ?> selected <?php endif; ?> value="Portugal">Portugal</option>
        <option <?php if(isset($value) && $value === "Puerto Rico"): ?> selected <?php endif; ?> value="Puerto Rico">Puerto Rico</option>
        <option <?php if(isset($value) && $value === "Qatar"): ?> selected <?php endif; ?> value="Qatar">Qatar</option>
        <option <?php if(isset($value) && $value === "Republic of Montenegr"): ?> selected <?php endif; ?> value="Republic of Montenegro">Republic of Montenegro</option>
        <option <?php if(isset($value) && $value === "Republic of Serbia"): ?> selected <?php endif; ?> value="Republic of Serbia">Republic of Serbia</option>
        <option <?php if(isset($value) && $value === "Reunion"): ?> selected <?php endif; ?> value="Reunion">Reunion</option>
        <option <?php if(isset($value) && $value === "Romania"): ?> selected <?php endif; ?> value="Romania">Romania</option>
        <option <?php if(isset($value) && $value === "Russia"): ?> selected <?php endif; ?> value="Russia">Russia</option>
        <option <?php if(isset($value) && $value === "Rwanda"): ?> selected <?php endif; ?> value="Rwanda">Rwanda</option>
        <option <?php if(isset($value) && $value === "St Barthelemy"): ?> selected <?php endif; ?> value="St Barthelemy">St Barthelemy</option>
        <option <?php if(isset($value) && $value === "St Eustatius"): ?> selected <?php endif; ?> value="St Eustatius">St Eustatius</option>
        <option <?php if(isset($value) && $value === "St Helena"): ?> selected <?php endif; ?> value="St Helena">St Helena</option>
        <option <?php if(isset($value) && $value === "St Kitts-Nevis"): ?> selected <?php endif; ?> value="St Kitts-Nevis">St Kitts-Nevis</option>
        <option <?php if(isset($value) && $value === "St Lucia"): ?> selected <?php endif; ?> value="St Lucia">St Lucia</option>
        <option <?php if(isset($value) && $value === "St Maarten"): ?> selected <?php endif; ?> value="St Maarten">St Maarten</option>
        <option <?php if(isset($value) && $value === "St Pierre &amp; Miquelon"): ?> selected <?php endif; ?> value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
        <option <?php if(isset($value) && $value === "St Vincent &amp; Grenadines"): ?> selected <?php endif; ?> value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
        <option <?php if(isset($value) && $value === "Saipan"): ?> selected <?php endif; ?> value="Saipan">Saipan</option>
        <option <?php if(isset($value) && $value === "Samoa"): ?> selected <?php endif; ?> value="Samoa">Samoa</option>
        <option <?php if(isset($value) && $value === "Samoa American"): ?> selected <?php endif; ?> value="Samoa American">Samoa American</option>
        <option <?php if(isset($value) && $value === "San Marino"): ?> selected <?php endif; ?> value="San Marino">San Marino</option>
        <option <?php if(isset($value) && $value === "Sao Tome &amp; Principe"): ?> selected <?php endif; ?> value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
        <option <?php if(isset($value) && $value === "Saudi Arabia"): ?> selected <?php endif; ?> value="Saudi Arabia">Saudi Arabia</option>
        <option <?php if(isset($value) && $value === "Senegal"): ?> selected <?php endif; ?> value="Senegal">Senegal</option>
        <option <?php if(isset($value) && $value === "Seychelles"): ?> selected <?php endif; ?> value="Seychelles">Seychelles</option>
        <option <?php if(isset($value) && $value === "Sierra Leone"): ?> selected <?php endif; ?> value="Sierra Leone">Sierra Leone</option>
        <option <?php if(isset($value) && $value === "Singapore"): ?> selected <?php endif; ?> value="Singapore">Singapore</option>
        <option <?php if(isset($value) && $value === "Slovakia"): ?> selected <?php endif; ?> value="Slovakia">Slovakia</option>
        <option <?php if(isset($value) && $value === "Slovenia"): ?> selected <?php endif; ?> value="Slovenia">Slovenia</option>
        <option <?php if(isset($value) && $value === "Solomon Islands"): ?> selected <?php endif; ?> value="Solomon Islands">Solomon Islands</option>
        <option <?php if(isset($value) && $value === "Somalia"): ?> selected <?php endif; ?> value="Somalia">Somalia</option>
        <option <?php if(isset($value) && $value === "South Africa"): ?> selected <?php endif; ?> value="South Africa">South Africa</option>
        <option <?php if(isset($value) && $value === "Spain"): ?> selected <?php endif; ?> value="Spain">Spain</option>
        <option <?php if(isset($value) && $value === "Sri Lanka"): ?> selected <?php endif; ?> value="Sri Lanka">Sri Lanka</option>
        <option <?php if(isset($value) && $value === "Sudan"): ?> selected <?php endif; ?> value="Sudan">Sudan</option>
        <option <?php if(isset($value) && $value === "Suriname"): ?> selected <?php endif; ?> value="Suriname">Suriname</option>
        <option <?php if(isset($value) && $value === "Swaziland"): ?> selected <?php endif; ?> value="Swaziland">Swaziland</option>
        <option <?php if(isset($value) && $value === "Sweden"): ?> selected <?php endif; ?> value="Sweden">Sweden</option>
        <option <?php if(isset($value) && $value === "Switzerland"): ?> selected <?php endif; ?> value="Switzerland">Switzerland</option>
        <option <?php if(isset($value) && $value === "Syria"): ?> selected <?php endif; ?> value="Syria">Syria</option>
        <option <?php if(isset($value) && $value === "Tahiti"): ?> selected <?php endif; ?> value="Tahiti">Tahiti</option>
        <option <?php if(isset($value) && $value === "Taiwan"): ?> selected <?php endif; ?> value="Taiwan">Taiwan</option>
        <option <?php if(isset($value) && $value === "Tajikistan"): ?> selected <?php endif; ?> value="Tajikistan">Tajikistan</option>
        <option <?php if(isset($value) && $value === "Tanzania"): ?> selected <?php endif; ?> value="Tanzania">Tanzania</option>
        <option <?php if(isset($value) && $value === "Thailand"): ?> selected <?php endif; ?> value="Thailand">Thailand</option>
        <option <?php if(isset($value) && $value === "Togo"): ?> selected <?php endif; ?> value="Togo">Togo</option>
        <option <?php if(isset($value) && $value === "Tokelau"): ?> selected <?php endif; ?> value="Tokelau">Tokelau</option>
        <option <?php if(isset($value) && $value === "Tonga"): ?> selected <?php endif; ?> value="Tonga">Tonga</option>
        <option <?php if(isset($value) && $value === "Trinidad &amp; Tobago"): ?> selected <?php endif; ?> value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
        <option <?php if(isset($value) && $value === "Tunisia"): ?> selected <?php endif; ?> value="Tunisia">Tunisia</option>
        <option <?php if(isset($value) && $value === "Turkey"): ?> selected <?php endif; ?> value="Turkey">Turkey</option>
        <option <?php if(isset($value) && $value === "Turkmenistan"): ?> selected <?php endif; ?> value="Turkmenistan">Turkmenistan</option>
        <option <?php if(isset($value) && $value === "Turks &amp; Caicos Is"): ?> selected <?php endif; ?> value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
        <option <?php if(isset($value) && $value === "Tuvalu"): ?> selected <?php endif; ?> value="Tuvalu">Tuvalu</option>
        <option <?php if(isset($value) && $value === "Uganda"): ?> selected <?php endif; ?> value="Uganda">Uganda</option>
        <option <?php if(isset($value) && $value === "United Kingdom"): ?> selected <?php endif; ?> value="United Kingdom">United Kingdom</option>
        <option <?php if(isset($value) && $value === "Ukraine"): ?> selected <?php endif; ?> value="Ukraine">Ukraine</option>
        <option <?php if(isset($value) && $value === "United Arab Erimates"): ?> selected <?php endif; ?> value="United Arab Erimates">United Arab Emirates</option>
        <option <?php if(isset($value) && $value === "United States of America"): ?> selected <?php endif; ?> value="United States of America">United States of America</option>
        <option <?php if(isset($value) && $value === "Uraguay"): ?> selected <?php endif; ?> value="Uraguay">Uruguay</option>
        <option <?php if(isset($value) && $value === "Uzbekistan"): ?> selected <?php endif; ?> value="Uzbekistan">Uzbekistan</option>
        <option <?php if(isset($value) && $value === "Vanuatu"): ?> selected <?php endif; ?> value="Vanuatu">Vanuatu</option>
        <option <?php if(isset($value) && $value === "Vatican City State"): ?> selected <?php endif; ?> value="Vatican City State">Vatican City State</option>
        <option <?php if(isset($value) && $value === "Venezuela"): ?> selected <?php endif; ?> value="Venezuela">Venezuela</option>
        <option <?php if(isset($value) && $value === "Vietnam"): ?> selected <?php endif; ?> value="Vietnam">Vietnam</option>
        <option <?php if(isset($value) && $value === "Virgin Islands (Brit)"): ?> selected <?php endif; ?> value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
        <option <?php if(isset($value) && $value === "Virgin Islands (USA)"): ?> selected <?php endif; ?> value="Virgin Islands (USA)">Virgin Islands (USA)</option>
        <option <?php if(isset($value) && $value === "Wake Island"): ?> selected <?php endif; ?> value="Wake Island">Wake Island</option>
        <option <?php if(isset($value) && $value === "Wallis"): ?> selected <?php endif; ?> value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
        <option <?php if(isset($value) && $value === "Yemen"): ?> selected <?php endif; ?> value="Yemen">Yemen</option>
        <option <?php if(isset($value) && $value === "Zaire"): ?> selected <?php endif; ?> value="Zaire">Zaire</option>
        <option <?php if(isset($value) && $value === "Zambia"): ?> selected <?php endif; ?> value="Zambia">Zambia</option>
        <option <?php if(isset($value) && $value === "Zimbabwe"): ?> selected <?php endif; ?> value="Zimbabwe">Zimbabwe</option>
    </select>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/fields/country-select.blade.php ENDPATH**/ ?>