
<form id="myForm">
    <input id="email" name="email" class="px-3 py-2 text-sm border border-gray-300 rounded-md lg:text-base" type="email" placeholder="Email" required />
    
    <input id="name" name="name" class="px-3 py-2 text-sm border border-gray-300 rounded-md lg:text-base" type="text" placeholder="Name (Last, First, Middle Initial)" required />
    
    <input id="applicationID" name="applicationID" class="px-3 py-2 text-sm border border-gray-300 rounded-md lg:text-base" type="number" placeholder="Application ID" required />
    
    <input id="department" name="department" class="px-3 py-2 text-sm border border-gray-300 rounded-md lg:text-base" type="text" placeholder="Department" required />

    <input id="requiredHours" name="requiredHours" class="px-3 py-2 text-sm border border-gray-300 rounded-md lg:text-base" type="number" placeholder="Required Hours" required />
    
    <input id="completedHours" name="completedHours" class="px-3 py-2 text-sm border border-gray-300 rounded-md lg:text-base" type="number" placeholder="Completed Hours" required />
    
    <input id="googleDriveLink" name="googleDriveLink" class="px-3 py-2 text-sm border border-gray-300 rounded-md lg:text-base" type="text" placeholder="Google Drive Link" required />

    <input id="testimonialVideoLink" name="testimonialVideoLink" class="px-3 py-2 border border-gray-300 rounded-md" type="text" placeholder="Insert Link" required /> <!-- testimonial vid glink-->
    
    <input id="fbPageReviewLink" name="fbPageReviewLink" class="px-3 py-2 border border-gray-300 rounded-md" type="text" placeholder="Insert Link" required /> <!--fb page review glink-->

    <input id="certificationNo" name="certification" type="radio" onclick="show(0)" /> <!-- if this is chosen, input textbox will show then input link of gdrive below then record it to database -->
        <input type="email" id="scanned" class="hidden px-3 py-2 border border-gray-300 rounded-md lg:w-3/4" placeholder="Insert Email" />
    <input id="certificationYes" name="certification" type="radio" onclick="show(1)" /> <!-- if this is chosen, it record "hardcopy" on database -->

    <input id="evalFormLink" name="evalFormLink" class="w-2/6 px-3 py-2 border border-gray-300 rounded-md" type="text" placeholder="Link here" /> <!--eval form glink-->
    
    <input id="signatureDocsLink" name="signatureDocsLink" class="w-2/6 px-3 py-2 border border-gray-300 rounded-md" type="text" placeholder="Link here" /> <!-- docs need signature glink-->
    
    <input id="forwardEmailLink" name="forwardEmailLink" class="w-2/6 px-3 py-2 border border-gray-300 rounded-md" type="text" placeholder="Link here" /> <!-- forward email -->

</form>

<!-- THIS PART IS ONLY TO EASILY LOCATE INPUT ID NAME TAGS OF INPUTS ON OFFBOARDING PAGE -->
<!-- note that once this successfully save to database it will also generate number for refference number -->