       <!-- Modal -->
       <div class="modal fade" id="changeStatus{{ $list_id }}" tabindex="-1" role="dialog"
           aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="true"
                   data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="true"
                   data-animation="pop" data-timer="null" style="display: block; margin-top: -169px;">
                   <div class="sa-icon sa-error" style="display: none;">
                       <span class="sa-x-mark">
                           <span class="sa-line sa-left"></span>
                           <span class="sa-line sa-right"></span>
                       </span>
                   </div>
                   <div class="sa-icon sa-warning pulseWarning" style="display: block;">
                       <span class="sa-body pulseWarningIns"></span>
                       <span class="sa-dot pulseWarningIns"></span>
                   </div>
                   <div class="sa-icon sa-info" style="display: none;"></div>
                   <div class="sa-icon sa-success" style="display: none;">
                       <span class="sa-line sa-tip"></span>
                       <span class="sa-line sa-long"></span>

                       <div class="sa-placeholder"></div>
                       <div class="sa-fix"></div>
                   </div>
                   <div class="sa-icon sa-custom" style="display: none;"></div>
                   <h2>Are you sure?</h2>
                   <p style="display: block;">You want to update the status!</p>
                   <fieldset>
                       <input type="text" tabindex="3" placeholder="">
                       <div class="sa-input-error"></div>
                   </fieldset>
                   <div class="sa-error-container">
                       <div class="icon">!</div>
                       <p>Not valid!</p>
                   </div>
                   <div class="sa-button-container">
                       <button class="cancel" tabindex="2" style="display: inline-block;"
                           fdprocessedid="xl5hihf">Cancel</button>
                       <div class="sa-confirm-button-container">
                           <button type="submit" class="confirm" tabindex="1"
                               style="display: inline-block; background-color: rgb(221, 107, 85); box-shadow: rgba(221, 107, 85, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;"
                               fdprocessedid="wb7z15">Yes!</button>
                           <div class="la-ball-fall">
                               <div></div>
                               <div></div>
                               <div></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
